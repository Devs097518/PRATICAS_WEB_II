<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'debit' => 'decimal:2',
        ];
    }

    public function hasDebit(): bool
    {
        return (float) $this->debit > 0;
    }

    public function addDebit(float $valor): void
    {
        $this->increment('debit', $valor);
    }

    public function clearDebit(): void
    {
        $this->debit = 0;
        $this->save();
    }

        public function books()
        {
            return $this->belongsToMany(Book::class, 'borrowings')
                        ->withPivot('id', 'borrowed_at', 'returned_at')
                        ->withTimestamps();
        }




}

