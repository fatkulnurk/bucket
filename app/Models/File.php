<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = [
        'link',
        'link_html',
        'link_forum',
        'link_delete',
        'size_format'
    ];

    public function getLinkAttribute($value)
    {
        return route('file-detail', $this->code);
    }

    public function getLinkHtmlAttribute($value)
    {
        return '<a href="' . route('file-detail', $this->code) . '">' . $this->name .'</a>';
    }

    public function getLinkForumAttribute($value)
    {
        return '<a href="' . route('file-detail', $this->code) . '">' . $this->name .'</a>';
    }

    public function getLinkDeleteAttribute($value)
    {
        return route('file-edit', $this->code) . '?id=' . $this->id . '&code=' . $this->code . '&delete_key=' . $this->delete_key .'&iterator=' . $this->iterator;
    }

    public function getSizeFormatAttribute($value)
    {
        $size = $this->size;
        $precision = 2;
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }
}
