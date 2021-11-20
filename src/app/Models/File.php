<?php

namespace Serdud\BackpackFiles\app\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use CrudTrait;

    protected $fillable = [
        'name',
        'file',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($obj) {
            if ($obj->file) {
                remove_files($obj->file, config('backpack.files.filesystem.disk'));
            }
        });
    }

    public function setFileAttribute($value)
    {
        $this->uploadFileToDisk($value, 'file', config('backpack.files.filesystem.disk'), config('backpack.files.filesystem.path'));
    }

    public function getFileAttribute($file)
    {
        return get_file_url($file, config('backpack.files.filesystem.disk'));
    }

    /**
     * @param array $ids
     *
     * @return Collection
     */
    public static function getByIds(array $ids): Collection
    {
        $ids = array_unique($ids);

        return !empty($ids) ? static::whereIn('id', $ids)->get() : new Collection;
    }
}
