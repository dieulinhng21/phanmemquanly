<?php
require "vendor/autoload.php";
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Category
 *
 * @author TKINH
 */
class Customer extends Model {
    protected $primaryKey = "idkhachhang";
    protected $table = "khachhang";
}
