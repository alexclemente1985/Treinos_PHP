function showImage(img){
    if(img.files && img.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#foto').attr('src', e.target.result).width(170);
        }
        reader.readAsDataURL(img.files[0]);
    }
}