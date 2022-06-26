<?php

namespace App\Repositories;

use App\Contracts\IUserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class UserRepository extends AbstractRepository implements IUserRepository
{
    // private $teste;
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->teste = $this->model;
    // }
    protected function resolveModel(): Model
    {
        return app(User::class);
    }

    public function teste()
    {
        return $this->model->all();
    }
}
