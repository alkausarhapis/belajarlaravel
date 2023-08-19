<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    // Query scope
    public function scopeFilter( $query, array $filters ) {
        // Native like way
        // if ( isset( $filters['search'] ) ? $filters['search'] : false ) {
        //     return $query->where( 'title', 'like', '%' . $filters['search'] . '%' )
        //         ->orWhere( 'body', 'like', '%' . $filters['search'] . '%' );
        // }

        // Laravel way (eloquent)
        // (?? merupakan null coalesing operator)
        // $query->when( $filters['search'] ?? false, function ( $query, $search ) {
        //     return $query->where( 'title', 'like', '%' . $search . '%' )
        //         ->orWhere( 'body', 'like', '%' . $search . '%' );
        // } );
        $query->when( $filters['search'] ?? false, fn( $query, $search ) =>
            $query->where( fn( $query ) => $query->where( 'title', 'like', '%' . $search . '%' )
                    ->orWhere( 'body', 'like', '%' . $search . '%' ) )
        );

        $query->when( $filters['category'] ?? false, function ( $query, $category ) {
            return $query->whereHas( 'category', function ( $query ) use ( $category ) {
                $query->where( 'slug', $category );
            } );
        } );

        $query->when( $filters['author'] ?? false, fn( $query, $author ) =>
            $query->whereHas( 'author', fn( $query ) => $query->where( 'username', $author ) )
        );
    }

    // Schema yang boleh diisi
    // protected $fillable = ['title', 'excerpt', 'body'];

    // Vice versa
    protected $guarded = ['id'];
    // eager loading
    protected $with = ['author', 'category'];

    // Relasi (belongsTo merupakan 1 to 1)
    public function category() {
        return $this->belongsTo( Category::class );
    }

    public function author() {
        // (param user_id utk memberitahu bahwa foreign key bernama user_id, jika tabel dan methodnya tdk sama)
        return $this->belongsTo( User::class, 'user_id' );
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName() {
        return 'slug';
    }

}