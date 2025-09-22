 {{-- <div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-6 p-4">
                <legend>{{ localize_uc('thumb_image_size') }}</legend>
                <div class="col-md-12">
                    <div class="row form-group">
                        <label for="thumb_height" class="col-form-label fw-semibold">
                            {{ localize_uc('height') }}
                            ({{ localize_uc('Y') }})
                            <span class="text-danger">*</span> </label>
                        <input type="number" name="thumb_height" id="thumb_height"
                            class="form-control @error('thumb_height') is-invalid @enderror"
                            placeholder="{{ localize_uc('enter_thumb_height') }}" value="{{ old('thumb_height', 240) }}"
                            required>
                        <div class="invalid-feedback error text-danger m-2">
                            @error('thumb_height')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row form-group">
                        <label for="thumb_width" class="col-form-label fw-semibold">
                            {{ localize_uc('width') }}
                            ({{ localize_uc('x') }})
                            <span class="text-danger">*</span> </label>
                        <input type="number" name="thumb_width" id="thumb_width"
                            class="form-control @error('thumb_width') is-invalid @enderror"
                            placeholder="{{ localize_uc('enter_thumb_width') }}" value="{{ old('thumb_width', 438) }}"
                            required>
                        <div class="invalid-feedback error text-danger m-2">
                            @error('thumb_width')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-4">
                <legend>{{ localize_uc('large_image_size') }}</legend>
                <div class="col-md-12">
                    <div class="row form-group">
                        <label for="large_height" class="col-form-label fw-semibold">
                            {{ localize_uc('height') }}
                            ({{ localize_uc('Y') }})
                            <span class="text-danger">*</span> </label>
                        <input type="number" name="large_height" id="large_height"
                            class="form-control @error('large_height') is-invalid @enderror"
                            placeholder="{{ localize_uc('enter_large_height') }}"
                            value="{{ old('large_height', 585) }}" required>
                        <div class="invalid-feedback error text-danger m-2">
                            @error('large_height')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row form-group">
                        <label for="large_width" class="col-form-label fw-semibold">
                            {{ localize_uc('width') }}
                            ({{ localize_uc('x') }})
                            <span class="text-danger">*</span> </label>
                        <input type="number" name="large_width" id="large_width"
                            class="form-control @error('large_width') is-invalid @enderror"
                            placeholder="{{ localize_uc('enter_large_width') }}" value="{{ old('large_width', 1067) }}"
                            required>
                        <div class="invalid-feedback error text-danger m-2">
                            @error('large_width')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="col-lg-12 col-xs-12 ">
            <div class="form-group">
                <label>{{ localize('image') }} <span class="text-danger">*</span></label>
                <input type="file" accept="image/*" name="image"
                    class="form-control file-preview @error('image') is-invalid @enderror"
                    data-previewDiv="preview_file_image" required />
                <div class="text-warning m-2">
                    * {{ localize_uc('file_size_max_5_mb') }}
                </div>
                <div class="invalid-feedback error text-danger m-2">
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>
                <div id="preview_file_image">
                    
                    <img class="img-responsive img-thumbnail" width="257" height="100">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-9 col-xs-9">
        <div class="row form-group">
            <label for="caption" class="col-form-label fw-semibold">
                {{ localize_uc('caption') }} </label>
            <input type="text" name="caption" id="caption"
                class="form-control @error('caption') is-invalid @enderror"
                placeholder="{{ localize_uc('enter_caption') }}" value="{{ old('caption') }}">
            <div class="invalid-feedback error text-danger m-2">
                @error('caption')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-3">
        <div class="row form-group">
            <label for="reference" class="col-form-label fw-semibold">
                {{ localize_uc('reference') }} </label>
            <input type="text" name="reference" id="reference"
                class="form-control @error('reference') is-invalid @enderror"
                placeholder="{{ localize_uc('enter_reference') }}" value="{{ old('reference') }}">
            <div class="invalid-feedback error text-danger m-2">
                @error('reference')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
</div>
 --}}



 {{--**************************** new code  for testing********************    --}}

{{-- new code   from ponoy vhai  --}}


{{-- Image Upload Section
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>{{ localize('image') }} <span class="text-danger">*</span></label>
            <input type="file" accept="image/*" name="image" id="photo"
                class="form-control @error('image') is-invalid @enderror" required>
            <input type="hidden" name="croppedImage" id="croppedImage">

            <div class="text-warning m-2">
                * {{ localize_uc('file_size_max_5_mb') }}
            </div>
            <div class="invalid-feedback error text-danger m-2">
                @error('image')
                    {{ $message }}
                @enderror
            </div>

            <div class="mt-2" id="preview_file_image">
                <img id="imagePreview" src="#" alt="Preview"
                    class="img-responsive img-thumbnail" style="max-width: 257px; display: none;">
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="cropperModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cropperModalLabel">{{ localize('Crop Image') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="cropperImage" src="#" style="max-width: 100%;">
            </div>
            <div class="modal-footer">
                <button type="button" id="cropButton" class="btn btn-primary">{{ localize('Crop & Save') }}</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ localize('Cancel') }}</button>
            </div>
        </div>
    </div>
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

<script>
    let cropper;

    $('#photo').on('change', function(e) {
        let file = e.target.files[0];
        if (!file) return;

        let reader = new FileReader();
        reader.onload = function(event) {
            $('#cropperImage').attr('src', event.target.result);
            $('#cropperModal').modal('show');
        };
        reader.readAsDataURL(file);
    });

    $('#cropperModal').on('shown.bs.modal', function() {
        cropper = new Cropper(document.getElementById('cropperImage'), {
            aspectRatio: 1,  
            viewMode: 1,
            dragMode: 'move',
            autoCropArea: 1,
            cropBoxResizable: true,
            cropBoxMovable: true
        });
    });

    $('#cropButton').on('click', function() {
        if (!cropper) return;

        let canvas = cropper.getCroppedCanvas({
            width: 438, 
            height: 240 
        });

        let croppedImage = canvas.toDataURL('image/jpeg');

        
        $('#croppedImage').val(croppedImage);

       
        $('#imagePreview').attr('src', croppedImage).show();

        $('#cropperModal').modal('hide');

        
        cropper.destroy();
    });
</script> 
---}}




{{-- ********************************************* --}}


{{-- new code  test  --}}

{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload with Cropping</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" rel="stylesheet">
    <style>
        .crop-container {
            max-height: 400px;
            margin: 20px 0;
        }
        .preview-container {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }
        .preview-box {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            min-height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .preview-box.has-image {
            border-style: solid;
            border-color: #198754;
        }
        .preview-image {
            max-width: 100%;
            max-height: 120px;
            border-radius: 4px;
        }
        .crop-controls {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
        }
        #originalImage {
            max-width: 100%;
            display: block;
        }
        .btn-group .btn {
            margin: 2px;
        }
        .size-info {
            font-size: 0.875rem;
            color: #6c757d;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <form id="imageUploadForm" method="POST" action="/upload-image" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6 p-4">
                            <legend>Thumb Image Size</legend>
                            <div class="col-md-12">
                                <div class="row form-group mb-3">
                                    <label for="thumb_height" class="col-form-label fw-semibold">
                                        Height (Y) <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" name="thumb_height" id="thumb_height"
                                        class="form-control" placeholder="Enter thumb height" 
                                        value="240" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row form-group mb-3">
                                    <label for="thumb_width" class="col-form-label fw-semibold">
                                        Width (X) <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" name="thumb_width" id="thumb_width"
                                        class="form-control" placeholder="Enter thumb width" 
                                        value="438" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-4">
                            <legend>Large Image Size</legend>
                            <div class="col-md-12">
                                <div class="row form-group mb-3">
                                    <label for="large_height" class="col-form-label fw-semibold">
                                        Height (Y) <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" name="large_height" id="large_height"
                                        class="form-control" placeholder="Enter large height"
                                        value="585" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row form-group mb-3">
                                    <label for="large_width" class="col-form-label fw-semibold">
                                        Width (X) <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" name="large_width" id="large_width"
                                        class="form-control" placeholder="Enter large width" 
                                        value="1067" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="col-lg-12 col-xs-12">
                        <div class="form-group">
                            <label>Image <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" name="image" id="imageInput"
                                class="form-control mb-2" required />
                            <div class="text-warning mb-2">
                                * File size max 5 MB
                            </div>
                            <div id="preview_file_image" class="preview-box">
                                <small class="text-muted">No image selected</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
            <div id="cropSection" class="row" style="display: none;">
                <div class="col-12">
                    <div class="crop-controls">
                        <h5>Crop Your Image</h5>
                        <div class="btn-group mb-3" role="group">
                            <button type="button" class="btn btn-secondary btn-sm" onclick="cropImage('thumb')">
                                <i class="fas fa-crop"></i> Crop for Thumbnail
                            </button>
                            <button type="button" class="btn btn-secondary btn-sm" onclick="cropImage('large')">
                                <i class="fas fa-crop"></i> Crop for Large
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="resetCrop()">
                                <i class="fas fa-undo"></i> Reset
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="rotateCrop(-90)">
                                <i class="fas fa-undo"></i> Rotate Left
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="rotateCrop(90)">
                                <i class="fas fa-redo"></i> Rotate Right
                            </button>
                        </div>
                        
                        <div class="crop-container">
                            <img id="originalImage" src="" alt="Original Image">
                        </div>

                        <div class="preview-container">
                            <div class="col-md-6">
                                <h6>Thumbnail Preview</h6>
                                <div id="thumbPreview" class="preview-box">
                                    <small class="text-muted">Crop for thumbnail to see preview</small>
                                </div>
                                <div class="size-info" id="thumbSizeInfo"></div>
                            </div>
                            <div class="col-md-6">
                                <h6>Large Image Preview</h6>
                                <div id="largePreview" class="preview-box">
                                    <small class="text-muted">Crop for large image to see preview</small>
                                </div>
                                <div class="size-info" id="largeSizeInfo"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9 col-xs-9">
                    <div class="row form-group mb-3">
                        <label for="caption" class="col-form-label fw-semibold">Caption</label>
                        <input type="text" name="caption" id="caption"
                            class="form-control" placeholder="Enter caption">
                    </div>
                </div>
                <div class="col-lg-3 col-xs-3">
                    <div class="row form-group mb-3">
                        <label for="reference" class="col-form-label fw-semibold">Reference</label>
                        <input type="text" name="reference" id="reference"
                            class="form-control" placeholder="Enter reference">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success" id="uploadBtn">
                        <i class="fas fa-upload"></i> Upload Image
                    </button>
                    <button type="button" class="btn btn-secondary ms-2" onclick="clearAll()">
                        <i class="fas fa-times"></i> Clear All
                    </button>
                    <button type="button" class="btn btn-warning ms-2" onclick="previewCrops()">
                        <i class="fas fa-eye"></i> Preview Crops
                    </button>
                </div>
            </div>

          
            <input type="hidden" name="cropped_thumb" id="croppedThumb">
            <input type="hidden" name="cropped_large" id="croppedLarge">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        let cropper = null;
        let originalImageData = null;

        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
               
                if (file.size > 5 * 1024 * 1024) {
                    alert('File size must be less than 5MB');
                    e.target.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    originalImageData = e.target.result;
                    
                   
                    const previewDiv = document.getElementById('preview_file_image');
                    previewDiv.innerHTML = `<img class="preview-image" src="${e.target.result}" alt="Original Image">`;
                    previewDiv.classList.add('has-image');
                    
                  
                    initializeCropper(e.target.result);
                    
                  
                    document.getElementById('cropSection').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        function initializeCropper(imageSrc) {
            const image = document.getElementById('originalImage');
            image.src = imageSrc;
            
           
            if (cropper) {
                cropper.destroy();
            }
            
           
            cropper = new Cropper(image, {
                aspectRatio: NaN, 
                viewMode: 1,
                dragMode: 'move',
                autoCropArea: 0.8,
                restore: false,
                guides: true,
                center: true,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
                ready: function () {
                   
                    console.log('Cropper initialized');
                }
            });
        }

        function cropImage(type) {
            if (!cropper) return;
            
            const thumbWidth = parseInt(document.getElementById('thumb_width').value) || 438;
            const thumbHeight = parseInt(document.getElementById('thumb_height').value) || 240;
            const largeWidth = parseInt(document.getElementById('large_width').value) || 1067;
            const largeHeight = parseInt(document.getElementById('large_height').value) || 585;
            
            let width, height, targetPreview, targetInput, targetSizeInfo;
            
            if (type === 'thumb') {
                width = thumbWidth;
                height = thumbHeight;
                targetPreview = document.getElementById('thumbPreview');
                targetInput = document.getElementById('croppedThumb');
                targetSizeInfo = document.getElementById('thumbSizeInfo');
            } else {
                width = largeWidth;
                height = largeHeight;
                targetPreview = document.getElementById('largePreview');
                targetInput = document.getElementById('croppedLarge');
                targetSizeInfo = document.getElementById('largeSizeInfo');
            }
            
           
            cropper.setAspectRatio(width / height);
            
           
            const canvas = cropper.getCroppedCanvas({
                width: width,
                height: height,
                minWidth: width,
                minHeight: height,
                maxWidth: width,
                maxHeight: height,
                fillColor: '#fff',
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high'
            });
            
            if (!canvas) {
                console.error('Failed to create canvas for cropping');
                return;
            }
            
           
            canvas.toBlob(function(blob) {
                const reader = new FileReader();
                reader.onload = function() {
                    const croppedDataURL = reader.result;
                    
                   
                    targetPreview.innerHTML = `<img class="preview-image" src="${croppedDataURL}" alt="${type} Preview">`;
                    targetPreview.classList.add('has-image');
                    
                
                    targetInput.value = croppedDataURL;
              
                    targetSizeInfo.textContent = `${width} x ${height} pixels`;
                    
                    console.log(`${type} image cropped successfully - Size: ${width}x${height}`);
                };
                reader.readAsDataURL(blob);
            }, 'image/jpeg', 0.95);
        }

        function resetCrop() {
            if (cropper) {
                cropper.reset();
                cropper.setAspectRatio(NaN); 
            }
        }

        function rotateCrop(degrees) {
            if (cropper) {
                cropper.rotate(degrees);
            }
        }

        function clearAll() {
           
            const fileInput = document.getElementById('imageInput');
            fileInput.value = '';
            
            const previewDiv = document.getElementById('preview_file_image');
            previewDiv.innerHTML = '<small class="text-muted">No image selected</small>';
            previewDiv.classList.remove('has-image');
            
            const thumbPreview = document.getElementById('thumbPreview');
            thumbPreview.innerHTML = '<small class="text-muted">Crop for thumbnail to see preview</small>';
            thumbPreview.classList.remove('has-image');
            
            const largePreview = document.getElementById('largePreview');
            largePreview.innerHTML = '<small class="text-muted">Crop for large image to see preview</small>';
            largePreview.classList.remove('has-image');
            
       
            document.getElementById('croppedThumb').value = '';
            document.getElementById('croppedLarge').value = '';
            
           
            document.getElementById('thumbSizeInfo').textContent = 'Target: 438 x 240 pixels';
            document.getElementById('largeSizeInfo').textContent = 'Target: 1067 x 585 pixels';
            
        
            const cropSection = document.getElementById('cropSection');
            cropSection.style.display = 'none';
            
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
            
          
            document.getElementById('caption').value = '';
            document.getElementById('reference').value = '';
            
            
            const submitBtn = document.getElementById('uploadBtn');
            submitBtn.innerHTML = '<i class="fas fa-upload"></i> Upload Image';
            submitBtn.disabled = false;
            
            console.log('Form cleared successfully');
        }

       
        document.getElementById('imageUploadForm').addEventListener('submit', function(e) {
            const originalFile = document.getElementById('imageInput').files[0];
            
            if (!originalFile) {
                e.preventDefault();
                alert('Please select an image first!');
                return;
            }
            
            const croppedThumb = document.getElementById('croppedThumb').value;
            const croppedLarge = document.getElementById('croppedLarge').value;
            
          
            if (!croppedThumb && cropper) {
                e.preventDefault();
                cropImage('thumb');
                setTimeout(() => {
                    if (!document.getElementById('croppedLarge').value) {
                        cropImage('large');
                    }
                    setTimeout(() => {
                        document.getElementById('imageUploadForm').submit();
                    }, 500);
                }, 500);
                return;
            }
            
            if (!croppedLarge && cropper) {
                e.preventDefault();
                cropImage('large');
                setTimeout(() => {
                    document.getElementById('imageUploadForm').submit();
                }, 500);
                return;
            }
            
           
            const submitBtn = document.getElementById('uploadBtn');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Uploading...';
            submitBtn.disabled = true;
            
            
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 10000);
        });

        function previewCrops() {
            const croppedThumb = document.getElementById('croppedThumb').value;
            const croppedLarge = document.getElementById('croppedLarge').value;
            
            if (!croppedThumb || !croppedLarge) {
                alert('Please crop the image for both thumbnail and large sizes first.');
                return;
            }
            
           
            const previewWindow = window.open('', '_blank', 'width=800,height=600');
            previewWindow.document.write(`
                <html>
                    <head><title>Image Preview</title></head>
                    <body style="font-family: Arial, sans-serif; padding: 20px;">
                        <h3>Thumbnail Preview</h3>
                        <img src="${croppedThumb}" style="border: 1px solid #ccc; margin: 10px;">
                        <h3>Large Image Preview</h3>
                        <img src="${croppedLarge}" style="border: 1px solid #ccc; margin: 10px; max-width: 100%;">
                    </body>
                </html>
            `);
        }

        
        ['thumb_width', 'thumb_height', 'large_width', 'large_height'].forEach(id => {
            document.getElementById(id).addEventListener('change', function() {
                const thumbWidth = document.getElementById('thumb_width').value;
                const thumbHeight = document.getElementById('thumb_height').value;
                const largeWidth = document.getElementById('large_width').value;
                const largeHeight = document.getElementById('large_height').value;
                
                if (thumbWidth && thumbHeight) {
                    document.getElementById('thumbSizeInfo').textContent = `Target: ${thumbWidth} x ${thumbHeight} pixels`;
                }
                if (largeWidth && largeHeight) {
                    document.getElementById('largeSizeInfo').textContent = `Target: ${largeWidth} x ${largeHeight} pixels`;
                }
            });
        });

        
        window.addEventListener('load', function() {
            document.getElementById('thumbSizeInfo').textContent = 'Target: 438 x 240 pixels';
            document.getElementById('largeSizeInfo').textContent = 'Target: 1067 x 585 pixels';
        });



function cropImage(type) {
    if (!cropper) return;

    const thumbWidth = parseInt(document.getElementById('thumb_width').value) || 438;
    const thumbHeight = parseInt(document.getElementById('thumb_height').value) || 240;
    const largeWidth = parseInt(document.getElementById('large_width').value) || 1067;
    const largeHeight = parseInt(document.getElementById('large_height').value) || 585;

    let width, height;

    if (type === 'thumb') {
        width = thumbWidth;
        height = thumbHeight;
    } else {
        width = largeWidth;
        height = largeHeight;
    }

    cropper.setAspectRatio(width / height);

    const canvas = cropper.getCroppedCanvas({
        width: width,
        height: height,
        fillColor: '#fff'
    });

    canvas.toBlob(function(blob) {
        const file = new File([blob], 'cropped_image.jpg', { type: 'image/jpeg' });

        
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        document.getElementById('imageInput').files = dataTransfer.files;

       
        const previewDiv = type === 'thumb' ? document.getElementById('thumbPreview') : document.getElementById('largePreview');
        previewDiv.innerHTML = `<img class="preview-image" src="${URL.createObjectURL(file)}" alt="${type} Preview">`;
        previewDiv.classList.add('has-image');

        console.log(`${type} cropped successfully`);
    }, 'image/jpeg', 0.95);
}


document.getElementById('imageUploadForm').addEventListener('submit', function(e){
    const originalFile = document.getElementById('imageInput').files[0];
    if (!originalFile) {
        e.preventDefault();
        alert('Please select an image first!');
        return;
    }

    if (cropper) {
        e.preventDefault();
        cropImage('large'); 
        setTimeout(() => this.submit(), 500); 
    }
});


    </script>
</body>
</html> --}}









{{-- final code 1  mostly working $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ --}}


{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload with Cropping</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" rel="stylesheet">
    <style>
        .crop-container {
            max-height: 400px;
            margin: 20px 0;
        }
        .preview-container {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }
        .preview-box {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            min-height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .preview-box.has-image {
            border-style: solid;
            border-color: #198754;
        }
        .preview-image {
            max-width: 100%;
            max-height: 120px;
            border-radius: 4px;
        }
        .crop-controls {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
        }
        #originalImage {
            max-width: 100%;
            display: block;
        }
        .btn-group .btn {
            margin: 2px;
        }
        .size-info {
            font-size: 0.875rem;
            color: #6c757d;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <form id="imageUploadForm" method="POST" action="/upload-image" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 p-4">
                        <legend>Thumb Image Size</legend>
                        <div class="col-md-12">
                            <div class="row form-group mb-3">
                                <label for="thumb_height" class="col-form-label fw-semibold">
                                    Height (Y) <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="thumb_height" id="thumb_height" class="form-control" value="240" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row form-group mb-3">
                                <label for="thumb_width" class="col-form-label fw-semibold">
                                    Width (X) <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="thumb_width" id="thumb_width" class="form-control" value="438" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-4">
                        <legend>Large Image Size</legend>
                        <div class="col-md-12">
                            <div class="row form-group mb-3">
                                <label for="large_height" class="col-form-label fw-semibold">
                                    Height (Y) <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="large_height" id="large_height" class="form-control" value="585" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row form-group mb-3">
                                <label for="large_width" class="col-form-label fw-semibold">
                                    Width (X) <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="large_width" id="large_width" class="form-control" value="1067" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col-lg-12 col-xs-12">
                    <div class="form-group">
                        <label>Image <span class="text-danger">*</span></label>
                        <input type="file" accept="image/*" name="image" id="imageInput" class="form-control mb-2" required>
                        <div class="text-warning mb-2">* File size max 5 MB</div>
                        <div id="preview_file_image" class="preview-box">
                            <small class="text-muted">No image selected</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Crop Section -->
        <div id="cropSection" class="row" style="display: none;">
            <div class="col-12">
                <div class="crop-controls">
                    <h5>Crop Your Image</h5>
                    <div class="btn-group mb-3">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="cropImage('thumb')">Crop for Thumb</button>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="cropImage('large')">Crop for Large</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="resetCrop()">Reset</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="rotateCrop(-90)">Rotate Left</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="rotateCrop(90)">Rotate Right</button>
                    </div>
                    <div class="crop-container">
                        <img id="originalImage" src="" alt="Original Image">
                    </div>
                    <div class="preview-container">
                        <div class="col-md-6">
                            <h6>Thumbnail Preview</h6>
                            <div id="thumbPreview" class="preview-box">
                                <small class="text-muted">Crop for thumbnail to see preview</small>
                            </div>
                            <div class="size-info" id="thumbSizeInfo"></div>
                        </div>
                        <div class="col-md-6">
                            <h6>Large Preview</h6>
                            <div id="largePreview" class="preview-box">
                                <small class="text-muted">Crop for large to see preview</small>
                            </div>
                            <div class="size-info" id="largeSizeInfo"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Caption & Reference -->
        <div class="row">
            <div class="col-lg-9 col-xs-9">
                <div class="row form-group mb-3">
                    <label for="caption" class="col-form-label fw-semibold">Caption</label>
                    <input type="text" name="caption" id="caption" class="form-control">
                </div>
            </div>
            <div class="col-lg-3 col-xs-3">
                <div class="row form-group mb-3">
                    <label for="reference" class="col-form-label fw-semibold">Reference</label>
                    <input type="text" name="reference" id="reference" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success" id="uploadBtn">Upload Image</button>
                <button type="button" class="btn btn-secondary ms-2" onclick="clearAll()">Clear All</button>
            </div>
        </div>

        <!-- Hidden inputs for cropped images -->
        <input type="hidden" name="cropped_thumb" id="croppedThumb">
        <input type="hidden" name="cropped_large" id="croppedLarge">
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
<script>
let cropper = null;
let originalData = null;

document.getElementById('imageInput').addEventListener('change', function(e){
    const file = e.target.files[0];
    if(!file) return;

    if(file.size > 5*1024*1024){ alert('Max 5MB'); e.target.value=''; return; }

    const reader = new FileReader();
    reader.onload = function(evt){
        originalData = evt.target.result;

        // Show preview
        const previewDiv = document.getElementById('preview_file_image');
        previewDiv.innerHTML = `<img class="preview-image" src="${evt.target.result}">`;
        previewDiv.classList.add('has-image');

        document.getElementById('cropSection').style.display = 'block';
        initializeCropper(evt.target.result);
    };
    reader.readAsDataURL(file);
});

function initializeCropper(src){
    const image = document.getElementById('originalImage');
    image.src = src;

    if(cropper) cropper.destroy();
    cropper = new Cropper(image, {
        viewMode:1,
        autoCropArea:0.8,
        movable:true,
        zoomable:true,
        rotatable:true,
        scalable:true,
        ready:()=>{ console.log('Cropper ready'); }
    });
}

function cropImage(type){
    if(!cropper) return;

    let width, height, targetPreview, targetInput;

    if(type==='thumb'){
        width = parseInt(document.getElementById('thumb_width').value);
        height = parseInt(document.getElementById('thumb_height').value);
        targetPreview = document.getElementById('thumbPreview');
        targetInput = document.getElementById('croppedThumb');
    } else {
        width = parseInt(document.getElementById('large_width').value);
        height = parseInt(document.getElementById('large_height').value);
        targetPreview = document.getElementById('largePreview');
        targetInput = document.getElementById('croppedLarge');
    }

    cropper.setAspectRatio(width/height);

    cropper.getCroppedCanvas({width,height}).toBlob(function(blob){
        // Convert blob to File and update input[type=file]
        const croppedFile = new File([blob], 'cropped.jpg', {type:'image/jpeg', lastModified: new Date().getTime()});
        const dt = new DataTransfer();
        dt.items.add(croppedFile);
        document.getElementById('imageInput').files = dt.files;

        // Preview
        const reader = new FileReader();
        reader.onload = function(evt){
            targetPreview.innerHTML = `<img class="preview-image" src="${evt.target.result}">`;
        };
        reader.readAsDataURL(croppedFile);

        // Save base64 (optional)
        targetInput.value = URL.createObjectURL(blob);
    }, 'image/jpeg', 0.95);
}

function resetCrop(){ if(cropper) cropper.reset(); }
function rotateCrop(deg){ if(cropper) cropper.rotate(deg); }

function clearAll(){
    document.getElementById('imageInput').value = '';
    document.getElementById('preview_file_image').innerHTML='<small>No image selected</small>';
    document.getElementById('cropSection').style.display='none';
    document.getElementById('thumbPreview').innerHTML='<small>Crop for thumb</small>';
    document.getElementById('largePreview').innerHTML='<small>Crop for large</small>';
    document.getElementById('croppedThumb').value='';
    document.getElementById('croppedLarge').value='';
    if(cropper) { cropper.destroy(); cropper=null; }
}
</script>
</body>
</html> --}}



{{-- ***********************another code  working perfectly ******************************   --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload with Cropping</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" rel="stylesheet">
    <style>
        .crop-container {
            max-height: 400px;
            margin: 20px 0;
        }
        .preview-container {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }
        .preview-box {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            min-height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .preview-box.has-image {
            border-style: solid;
            border-color: #198754;
        }
        .preview-image {
            max-width: 100%;
            max-height: 120px;
            border-radius: 4px;
        }
        .crop-controls {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
        }
        #originalImage {
            max-width: 100%;
            display: block;
        }
        .btn-group .btn {
            margin: 2px;
        }
        .size-info {
            font-size: 0.875rem;
            color: #6c757d;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <form id="imageUploadForm" method="POST" action="/upload-image" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 p-4">
                        <legend>Thumb Image Size</legend>
                        <div class="col-md-12">
                            <div class="row form-group mb-3">
                                <label for="thumb_height" class="col-form-label fw-semibold">
                                    Height (Y) <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="thumb_height" id="thumb_height" class="form-control" value="240" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row form-group mb-3">
                                <label for="thumb_width" class="col-form-label fw-semibold">
                                    Width (X) <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="thumb_width" id="thumb_width" class="form-control" value="438" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-4">
                        <legend>Large Image Size</legend>
                        <div class="col-md-12">
                            <div class="row form-group mb-3">
                                <label for="large_height" class="col-form-label fw-semibold">
                                    Height (Y) <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="large_height" id="large_height" class="form-control" value="585" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row form-group mb-3">
                                <label for="large_width" class="col-form-label fw-semibold">
                                    Width (X) <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="large_width" id="large_width" class="form-control" value="1067" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col-lg-12 col-xs-12">
                    <div class="form-group">
                        <label>Image <span class="text-danger">*</span></label>
                        <input type="file" accept="image/*" name="image" id="imageInput" class="form-control mb-2" required>
                        <div class="text-warning mb-2">* File size max 5 MB</div>
                        <div id="preview_file_image" class="preview-box">
                            <small class="text-muted">No image selected</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Crop Section -->
        <div id="cropSection" class="row" style="display: none;">
            <div class="col-12">
                <div class="crop-controls">
                    <h5>Crop Your Image</h5>
                    <div class="btn-group mb-3">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="cropImage('thumb')">Crop for Thumb</button>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="cropImage('large')">Crop for Large</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="resetCrop()">Reset</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="rotateCrop(-90)">Rotate Left</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="rotateCrop(90)">Rotate Right</button>
                    </div>
                    <div class="crop-container">
                        <img id="originalImage" src="" alt="Original Image">
                    </div>
                    <div class="preview-container">
                        <div class="col-md-6">
                            <h6>Thumbnail Preview</h6>
                            <div id="thumbPreview" class="preview-box">
                                <small class="text-muted">Crop for thumbnail to see preview</small>
                            </div>
                            <div class="size-info" id="thumbSizeInfo"></div>
                        </div>
                        <div class="col-md-6">
                            <h6>Large Preview</h6>
                            <div id="largePreview" class="preview-box">
                                <small class="text-muted">Crop for large to see preview</small>
                            </div>
                            <div class="size-info" id="largeSizeInfo"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Caption & Reference -->
        <div class="row">
            
            <div class="col-lg-9 col-xs-9">
                <div class="row form-group mb-3">
                    <label for="caption" class="col-form-label fw-semibold">Caption</label>
                    <input type="text" name="caption" id="caption" class="form-control">
                </div>
            </div>
            <div class="col-lg-3 col-xs-3">
                <div class="row form-group mb-3">
                    <label for="reference" class="col-form-label fw-semibold">Reference</label>
                    <input type="text" name="reference" id="reference" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success" id="uploadBtn">Upload Image</button>
                <button type="button" class="btn btn-secondary ms-2" onclick="clearAll()">Clear All</button>
            </div>
        </div>

        <!-- Hidden inputs for cropped images -->
        <input type="hidden" name="cropped_thumb" id="croppedThumb">
        <input type="hidden" name="cropped_large" id="croppedLarge">
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
<script>
let cropper = null;
let originalData = null;

document.getElementById('imageInput').addEventListener('change', function(e){
    const file = e.target.files[0];
    if(!file) return;

    if(file.size > 5*1024*1024){ alert('Max 5MB'); e.target.value=''; return; }

    const reader = new FileReader();
    reader.onload = function(evt){
        originalData = evt.target.result;

        // Show preview
        const previewDiv = document.getElementById('preview_file_image');
        previewDiv.innerHTML = `<img class="preview-image" src="${evt.target.result}">`;
        previewDiv.classList.add('has-image');

        document.getElementById('cropSection').style.display = 'block';
        initializeCropper(evt.target.result);
    };
    reader.readAsDataURL(file);
});

function initializeCropper(src){
    const image = document.getElementById('originalImage');
    image.src = src;

    if(cropper) cropper.destroy();
    cropper = new Cropper(image, {
        viewMode:1,
        autoCropArea:0.8,
        movable:true,
        zoomable:true,
        rotatable:true,
        scalable:true,
        cropBoxMovable:true,   // allow moving crop box
        cropBoxResizable:true, // allow resizing crop box
        ready:()=>{ console.log('Cropper ready'); }
    });
}

function cropImage(type){
    if(!cropper) return;

    let width, height, targetPreview, targetInput;

    if(type==='thumb'){
        width = parseInt(document.getElementById('thumb_width').value);
        height = parseInt(document.getElementById('thumb_height').value);
        targetPreview = document.getElementById('thumbPreview');
        targetInput = document.getElementById('croppedThumb');
    } else {
        width = parseInt(document.getElementById('large_width').value);
        height = parseInt(document.getElementById('large_height').value);
        targetPreview = document.getElementById('largePreview');
        targetInput = document.getElementById('croppedLarge');
    }

    cropper.getCroppedCanvas({width,height}).toBlob(function(blob){
        const croppedFile = new File([blob], 'cropped.jpg', {type:'image/jpeg'});
        const dt = new DataTransfer();
        dt.items.add(croppedFile);
        document.getElementById('imageInput').files = dt.files;

        const reader = new FileReader();
        reader.onload = function(evt){
            targetPreview.innerHTML = `<img class="preview-image" src="${evt.target.result}">`;
        };
        reader.readAsDataURL(croppedFile);

        targetInput.value = URL.createObjectURL(blob);
    }, 'image/jpeg', 0.95);
}

function resetCrop(){ if(cropper) cropper.reset(); }
function rotateCrop(deg){ if(cropper) cropper.rotate(deg); }

function clearAll(){
    document.getElementById('imageInput').value = '';
    document.getElementById('preview_file_image').innerHTML='<small>No image selected</small>';
    document.getElementById('cropSection').style.display='none';
    document.getElementById('thumbPreview').innerHTML='<small>Crop for thumb</small>';
    document.getElementById('largePreview').innerHTML='<small>Crop for large</small>';
    document.getElementById('croppedThumb').value='';
    document.getElementById('croppedLarge').value='';
    if(cropper) { cropper.destroy(); cropper=null; }
}
</script>
</body>
</html>