<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model {

  use HasFactory;
  
  protected $table = 'job_listings';

  protected $guarded = [];
  // protected $fillable = ['title', 'description', 'employer_id'];
  // guarded is the opposite of fillable - it means that all fields are guarded except for the ones listed in the array.
  // we use that to protect the fields that we don't want to be mass assignable.

  public function employer() {
    return $this->belongsTo(Employer::class);
  }

  public function tags() {
    return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
  } 

}