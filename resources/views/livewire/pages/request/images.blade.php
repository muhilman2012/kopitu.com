<div>
    <div class="flex-shrink-0">
        <?php $extension = array("jpg", "jpeg", "png", "webp", "gif", "svg"); ?>
        @if (in_array(substr(strrchr ($img->file1, '.'), 1), $extension))
        <img src="{{ url('/images/rfq/' . $img->file1) }}" alt="..." class="img-fluid">
        @elseif (in_array(substr(strrchr ($img->file2, '.'), 1), $extension))
        <img src="{{ url('/images/rfq/' . $img->file2) }}" alt="..." class="img-fluid">
        @elseif (in_array(substr(strrchr ($img->file3, '.'), 1), $extension))
        <img src="{{ url('/images/rfq/' . $img->file3) }}" alt="..." class="img-fluid">
        @elseif (in_array(substr(strrchr ($img->file4, '.'), 1), $extension))
        <img src="{{ url('/images/rfq/' . $img->file4) }}" alt="..." class="img-fluid">
        @else
        <img src="{{ url('/images/icons/plus.png') }}" alt="..." class="img-fluid">
        @endif
    </div>
</div>
