<?php

namespace App\Services;


use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
class RoleService extends BaseService
{
    protected $userRepository;
    public function __construct(RoleRepository $roleRepository,UserRepository $userRepository)
    {
        parent::__construct($roleRepository);
        $this->userRepository = $userRepository;
    }
    public function assignRole($User_id, array $Role_id){
            $User=$this->userRepository->findOne($User_id);
            $User->roles()->syncWithoutDetaching($Role_id);
             $User->save();
    }
  
}
