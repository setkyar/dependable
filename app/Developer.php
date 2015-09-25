<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    /**
     * @var string
     */
    protected $table = "developer";

    /**
     * @var array
     */
    protected $fillable = [
        "github_id",
        "github_nickname",
        "github_name",
        "github_email",
        "github_avatar",
    ];
}