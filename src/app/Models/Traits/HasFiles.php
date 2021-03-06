<?php

namespace Serdud\BackpackFiles\app\Models\Traits;

trait HasFiles
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function file()
    {
        return $this->belongsTo(\Serdud\BackpackFiles\app\Models\File::class);
    }
}
