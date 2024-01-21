<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */

    // Compara o usuario logado com o exibido na pagina edit, se for o mesmo, ele permite a edição
    public function update(User $user, User $model)
    {
        // IS: determina se os 2 modelos tem os MESMO id e pertencem a MESMA tabela, ou seja, se são exatamente iguais.
        return $user->is($model);
    }
}
