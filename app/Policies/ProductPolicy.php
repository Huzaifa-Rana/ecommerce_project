<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    // app/Policies/ProductPolicy.php
    public function viewAny(User $user)
    {
        return $user->hasRole('admin');
    }

    public function create(User $user)
    {
        return $user->hasRole('admin');
    }

    public function update(User $user, Product $product)
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Product $product)
    {
        return $user->hasRole('admin');
    }
}