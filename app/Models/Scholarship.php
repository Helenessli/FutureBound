<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Scholarship extends Authenticatable
{
    public $name;

    public $deadline;

    public $amount;

    public $criteria;

    public $url;

    public $body;

    public $slug;

    public function __construct($name, $deadline, $amount, $criteria, $url, $body, $slug){
        $this->name = $name;
        $this->deadline = $deadline;
        $this->amount = $amount;
        $this->criteria = $criteria;
        $this->url = $url;
        $this->body = $body;
        $this->slug = $slug;
    }
    public static function alll()
    {
        return collect(File::files(resource_path("scholarships")))
    ->map(fn($file) => YamlFrontMatter::parseFile($file))
    ->map(fn($document) => new Scholarship(
            $document->name,
            $document->deadline,
            $document->amount,
            $document->criteria,
            $document->url,
            $document->body(),
            $document->slug
        ));
    }
    public static function find($slug){
        return static::all()->firstWhere('slug', $slug);

    }
}

