<?php
 
namespace App\Policies;

use App\Models\User;
 
class LivroPolicy
{
    public function create(?User $user): bool
    {
        return !is_null($user);
    }

    public function delete(?User $user): bool
    {
        return !is_null($user);
    }

    public function update(?User $user): bool
    {
        return !is_null($user);
    }
}