<div class="col-12">
    <div class="row">

        <div class="col-md-6">
            <label class="label-margin">Product Thumbnail</label>
            <div>
                <input name="product_thumnail" type="file" class="form-control" onChange="mainThumbUrl(this)"/>

                <img src="" id="mainThmb">

                @error('product_thumnail')

                    <span class="text-danger">{{ $message }}</span>

                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <label class="label-margin">Multiple Image</label>
            <div>
                <input name="multi_imgs[]" type="file" class="form-control" multiple="" id="multiImg"/>

                @error('product_image')

                    <span class="text-danger">{{ $message }}</span>

                @enderror
                <div id="preview_img" class="row"></div>
            </div>
        </div>

    </div>
</div> <!-- end 5th row -->