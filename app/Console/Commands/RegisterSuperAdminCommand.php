<?php

namespace App\Console\Commands;

use App\User;
use App\Role;
use Carbon\Carbon;

use Illuminate\Console\Command;

class RegisterSuperAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register super admin';

    /**
     * User model.
     *
     * @var object
     */
    private $user;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        parent::__construct();

        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        if (! Role::find(1)) {
            $this->error('Role definitions have not been run.
            please update the role definitions first using  php artisan roles:update command');
            return;
        }

        $this->inputAdmin();

    }

    /**
     * Input and verify super admin details
     * 
     * @return void
     */

    private function inputAdmin()
    {

       $name = $this->ask('Enter full name');
       $email = $this->ask('Enter the admin Email address');

       while(! $this->isValidEmail($email)){
           $this->error('Email is invalid');
           $email = $this->ask('Email the admin Email address again');
       }

       $password = $this->secret('Enter the admin\'s password?');

       while (! $this->isRequiredLength($password)) {
           $this->error('Password must be more that eight characters');
           $password = $this->secret('Enter the admin\'s password?');
       }

       $confirmPassword = $this->secret('Confirm the admin\'s password?');
           
       while (! $this->isMatch($password, $confirmPassword)) {
           $this->error('Password and Confirm password do not match');

           $password = $this->secret('Enter new admin\'s password?');

           while (! $this->isRequiredLength($password)) {
               $this->error('Password must be more that six characters');
               $password = $this->secret('Enter new admin\'s password?');
           }

           $confirmPassword = $this->secret('Confirm the admin\'s password?');
       }

       $user = new User();
       $user->name = $name;
       $user->email = $email;
       $user->role_id = Role::where('slug','administrator')->pluck('id')->first();
       $user->email_verified_at = Carbon::now();
       $user->password = bcrypt($password);
       $user->save();

       $this->display($user);

    }

   /**
    * Dispaly the registered Admin details
    * 
    * @return table
    */

   private function display(User $admin) : void
   {
       $headers = ['Name', 'Email'];

       $fields = [
           'Name' => $admin->name,
           'email' => $admin->email
       ];

       $this->info('Super admin created successfully');
       $this->table($headers, [$fields]);
   }

   /**
    * Check if email is valid
    *
    * @param string $email
    * @return boolean
    */
   private function isValidEmail(string $email) :bool
   {
       return filter_var($email, FILTER_VALIDATE_EMAIL);
   }

   /**
    * Check if password and confirm password matches.
    *
    * @param string $password
    * @param string $confirmPassword
    * @return bool
    */
   private function isMatch(string $password, string $confirmPassword) : bool
   {
       return $password === $confirmPassword;
   }

   /**
    * Checks if password is longer than eight characters.
    *
    * @param string $password
    * @return bool
    */
   private function isRequiredLength(string $password) : bool
   {
       return strlen($password) > 8;
   }
}
