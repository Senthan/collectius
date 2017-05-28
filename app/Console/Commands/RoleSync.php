<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Policy;
use App\PolicyMethod;


class RoleSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Role policies';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $policyFiles = array_values(array_filter(scandir(app_path('Policies')), function($name) {
            if($name == 'Policy.php') {
                return false;
            }
            if(strpos($name, '.php')) {
                return true;
            }
        }));

        foreach ($policyFiles as $policyFile) {
            $policyFileName = 'App\Policies\\' . str_replace('.php', '', $policyFile);
            $policyInstance = new $policyFileName();
            $policyClassName = class_basename($policyInstance);
            $policy = Policy::firstOrNew(['name' => $policyClassName]);
            $policy->save();
            $methods = $policyInstance->getMethods();

            $currentPolicyMethods = $policy->policyMethods->pluck('name', 'id')->toArray();

            $newMethods = array_diff($methods, $currentPolicyMethods);
            $removedMethods = array_diff($currentPolicyMethods, $methods);

            foreach ($newMethods as $method) {
                PolicyMethod::firstOrCreate(['name' => $method, 'policy_id' => $policy->id]);
            }

            PolicyMethod::destroy(array_keys($removedMethods));
        }
    }
}
