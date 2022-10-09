<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use TypiCMS\NestableTrait;

class Category extends Model
{
    use NestableTrait;
    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug', 'description', 'parent_id', 'featured', 'menu', 'image'
    ];

    protected $casts = [
        'parent_id' =>  'integer',
        'featured'  =>  'boolean',
        'menu'      =>  'boolean'
    ];
        public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str::slug($value);
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
        /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    }
}


// $validatedData = $request->validate([
//             'name' => 'required|max:55',
//             'email' => 'email|required|unique:users',
//             'password' => 'required|confirmed'
//         ]);

//         $validatedData['password'] = bcrypt($request->password);

//         $user = User::create($validatedData);

//         $accessToken = $user->createToken('authToken')->accessToken;

//         return response([ 'user' => $user, 'access_token' => $accessToken]);
    

    // public function login(Request $request)
    // {
    //     $loginData = $request->validate([
    //         'email' => 'email|required',
    //         'password' => 'required'
    //     ]);

    //     if (!auth()->attempt($loginData)) {
    //         return response(['message' => 'Invalid Credentials']);
    //     }

    //     $accessToken = auth()->user()->createToken('authToken')->accessToken;

    //     return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    // }