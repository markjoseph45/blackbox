	var specList = [];
	var color = [];
	var size = [];
	var shoeSize = [];
	var images = [];
	var productImage = [];
	var finalProductSubcategory = "";
	var finalProductName = "";
	var finalProductDetails = "";
	var finalProductCategory = "";
	var finalProductPrice = "";
	var finalProductStocks = "";
	var finalProductBrandName = "";
	var forInputCount = 0;
	var colorCount = 0;
	var clothSize = 0;
	var shoeSizeEx = 0;
/////////////////////////////////////// Image 1 ////////////////////////////////////////
$('document').ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

var base = $("#base").attr("value");

function reload(){
    var refrsesh = document.getElementById('refresh');
    var form = document.getElementById('addProdSubmit');
    form.style.opacity = 0.2;
    $(refrsesh).fadeIn('slow');
    setTimeout(function(){
      location.reload();
    },2000);


}
  (function (){
      var image1 = document.getElementById('dropzone');
      var image2 = document.getElementById('sec_image');
      var image3 = document.getElementById('third_image');
      var image4 = document.getElementById('fourth_image');
      var image5 = document.getElementById('fifth_image');
      var main_Image = document.getElementById('forMainImage');
      prod_images1 = '';
      var displayUploads = function(data){
                  var loader = '../images/default_img/default (7).svg';
                  image1.style.padding = '90px';
                  image1.src = loader;
                  document.getElementById('imageError').innerHTML = '';
                  image1.style.border = '3px solid #4BA6FF';
                  image2.style.border = '2px solid #4BA6FF';
                  image3.style.border = '2px solid #4BA6FF';
                  image4.style.border = '2px solid #4BA6FF';
                  image5.style.border = '2px solid #4BA6FF';
                  setTimeout(function(){
                    image1.style.padding = '0px';
                    image1.src = '';
                    image1.src = data[0].file;
                    prod_images1 = data[0].file;
                    main_Image.value = data[0].name; },5000);
                  setTimeout(function(){
                     $('#spanSuccessImageUpload').fadeIn('slow');
                  },7000);
                  setTimeout(function(){
                     $('#spanSuccessImageUpload').fadeOut('slow');
                  },9000);

     }
      var upload = function(files){
        var imageType = files[0].type;
        var imageSize = files[0].size;
        var typeImg = imageType.substring(imageType.lastIndexOf("/") + 1).toLowerCase();
        if (files.length > 1) {
          document.getElementById('imageError').innerHTML = 'Please drop only one image.';
          image1.style.border = '2px solid #FF5050';
          image1.src = '../images/default_img/circleDrop.jpg';
          prod_images1 = '';
          $('#spanErrorImageUpload').fadeIn(2000);
          setTimeout(function(){
              $('#spanErrorImageUpload').fadeOut('slow');
          },6000)
        }
        else if (typeImg != 'jpeg' && typeImg != 'jpg' && typeImg != 'png' && typeImg != 'gif' && typeImg != 'bmp') {
          document.getElementById('imageError').innerHTML = 'Only images with jpg, gif, png, jpeg and bmp format is allowed.';
          image1.style.border = '2px solid #FF5050';
          image1.src = '../images/default_img/circleDrop.jpg';
          prod_images1 = '';
          $('#spanErrorImageUpload').fadeIn(2000);
          setTimeout(function(){
              $('#spanErrorImageUpload').fadeOut('slow');
          },6000)
        }
        else if (imageSize > 1000000) {
          document.getElementById('imageError').innerHTML = 'Sorry, this file is too large.';
          image1.style.border = '2px solid #FF5050';
          image1.src = '../images/default_img/circleDrop.jpg';
          prod_images1 = '';
          $('#spanErrorImageUpload').fadeIn(2000);
          setTimeout(function(){
              $('#spanErrorImageUpload').fadeOut('slow');
          },6000)
        }
        else{
          var formData = new FormData();
          var xhr = new XMLHttpRequest();
          for (var x = 0; x < files.length; x++) {
              formData.append('file[]', files[x]);
             }
          xhr.onload = function(){
                            var data = JSON.parse(this.responseText);
                            displayUploads(data);
                        }
          xhr.open('post', base+'/shop/upload');
          xhr.send(formData);
          }
        }
      image1.ondrop = function(e){
      e.preventDefault();
      upload(e.dataTransfer.files);
      }
      image1.onclick = function(e){
      e.preventDefault();
      var imageUpload = document.getElementById('file');
      imageUpload.click();
          imageUpload.onchange = function(e){
            upload(e.target.files);
          }
      }
      image1.ondragover = function(){
      image1.style.border = '3px solid #4BA6FF';
      document.getElementById('imageError').innerHTML = '';
      image2.style.border = '2px solid #4BA6FF';
      image3.style.border = '2px solid #4BA6FF';
      image4.style.border = '2px solid #4BA6FF';
      image5.style.border = '2px solid #4BA6FF';
      return false;
      }
      image1.ondragleave = function(){
      image1.style.border = '3px dashed #4BA6FF';
      return false;
      }
  }());
/////////////////////////////////////// Image 2 ////////////////////////////////////////
  (function (){
      var image1 = document.getElementById('dropzone');
      var image2 = document.getElementById('sec_image');
      var image3 = document.getElementById('third_image');
      var image4 = document.getElementById('fourth_image');
      var image5 = document.getElementById('fifth_image');
      var secImage = document.getElementById('image2');
      prod_images2 = '';
      var displayUploads = function(data){
                  var loader = '../images/default_img/default (7).svg';
                  image2.style.padding = '10px';
                  image2.src = loader;
                  document.getElementById('imageError').innerHTML = '';
                  image1.style.border = '3px solid #4BA6FF';
                  image2.style.border = '2px solid #4BA6FF';
                  image3.style.border = '2px solid #4BA6FF';
                  image4.style.border = '2px solid #4BA6FF';
                  image5.style.border = '2px solid #4BA6FF';
                  setTimeout(function(){
                    image2.style.padding = '0px';
                    image2.src = '';
                    image2.src = data[0].file;
                    prod_images2 = data[0].file;
                    secImage.value = data[0].name },3000)

     }
      var upload = function(files){
        var imageType = files[0].type;
        var imageSize = files[0].size;
        var typeImg = imageType.substring(imageType.lastIndexOf("/") + 1).toLowerCase();
        if (files.length > 1) {
          document.getElementById('imageError').innerHTML = 'Please drop only one image';
          image2.style.border = '2px solid #FF5050';
          image2.src = '../images/default_img/circleDrop.jpg';
          prod_images2 = '';
        }
        else if (typeImg != 'jpeg' && typeImg != 'jpg' && typeImg != 'png' && typeImg != 'gif' && typeImg != 'bmp') {
          document.getElementById('imageError').innerHTML = 'Only images with jpg, gif, png, jpeg and bmp format is allowed';
          image2.style.border = '2px solid #FF5050';
          image2.src = '../images/default_img/circleDrop.jpg';
          prod_images2 = '';
        }
        else if (imageSize > 1000000) {
          document.getElementById('imageError').innerHTML = 'Sorry, this file is too large.';
          image2.style.border = '2px solid #FF5050';
          image2.src = '../images/default_img/circleDrop.jpg';
          prod_images2 = '';
        }
        else if (prod_images1 == ''){
          document.getElementById('imageError').innerHTML = 'Please, drop an image first in the "Main Image" section.';
          image2.style.border = '2px solid #FF5050';
          image1.style.border = '3px dashed #00E672';
          image2.src = '../images/default_img/circleDrop.jpg';
          prod_images2 = '';
        }
        else{
          var formData = new FormData();
          var xhr = new XMLHttpRequest();
          for (var x = 0; x < files.length; x++) {
              formData.append('file[]', files[x]);
             }
          xhr.onload = function(){
                            var data = JSON.parse(this.responseText);
                            displayUploads(data);
                        }
          xhr.open('post', base+'/shop/upload');
          xhr.send(formData);
          }
        }
      image2.ondrop = function(e){
      e.preventDefault();
      upload(e.dataTransfer.files)
      }
      image2.onclick = function(e){
      e.preventDefault();
      var imageUpload = document.getElementById('file2');
      imageUpload.click();
          imageUpload.onchange = function(e){
            upload(e.target.files);
          }
      }
      image2.ondragover = function(){
      image2.style.border = '2px dashed #4BA6FF';
      document.getElementById('imageError').innerHTML = '';
      image3.style.border = '2px solid #4BA6FF';
      image4.style.border = '2px solid #4BA6FF';
      image5.style.border = '2px solid #4BA6FF';
      return false;
      }
      image2.ondragleave = function(){
      image2.style.border = '2px solid #4BA6FF';
      return false;
      }
      image2.onmouseover = function(){
        if (prod_images2 != '') {
          image1.src = prod_images2;
          image2.src = prod_images1;
        }
      }
      image2.onmouseleave = function(){
        if (prod_images2 != '') {
          image1.src = prod_images1;
          image2.src = prod_images2;
        }
      }
  }());
/////////////////////////////////////// Image 3 ////////////////////////////////////////
  (function (){
      var image1 = document.getElementById('dropzone');
      var image2 = document.getElementById('sec_image');
      var image3 = document.getElementById('third_image');
      var image4 = document.getElementById('fourth_image');
      var image5 = document.getElementById('fifth_image');
      var trirdImage = document.getElementById('image3');
      prod_images3 = '';
      var displayUploads = function(data){
                  var loader = '../images/default_img/default (7).svg';
                  image3.style.padding = '10px';
                  image3.src = loader;
                  document.getElementById('imageError').innerHTML = '';
                  image1.style.border = '3px solid #4BA6FF';
                  image2.style.border = '2px solid #4BA6FF';
                  image3.style.border = '2px solid #4BA6FF';
                  image4.style.border = '2px solid #4BA6FF';
                  image5.style.border = '2px solid #4BA6FF';
                  setTimeout(function(){
                    image3.style.padding = '0px';
                    image3.src = '';
                    image3.src = data[0].file;
                    prod_images3 = data[0].file;
                    trirdImage.value = data[0].name },3000)

     }
      var upload = function(files){
        var imageType = files[0].type;
        var imageSize = files[0].size;
        var typeImg = imageType.substring(imageType.lastIndexOf("/") + 1).toLowerCase();
        if (files.length > 1) {
          document.getElementById('imageError').innerHTML = 'Please drop only one image';
          image3.style.border = '2px solid #FF5050';
          image3.src = '../images/default_img/circleDrop.jpg';
          prod_images3 = '';
        }
        else if (typeImg != 'jpeg' && typeImg != 'jpg' && typeImg != 'png' && typeImg != 'gif' && typeImg != 'bmp') {
          document.getElementById('imageError').innerHTML = 'Only images with jpg, gif, png, jpeg and bmp format is allowed';
          image3.style.border = '2px solid #FF5050';
          image3.src = '../images/default_img/circleDrop.jpg';
          prod_images3 = '';
        }
        else if (imageSize > 1000000) {
          document.getElementById('imageError').innerHTML = 'Sorry, this file is too large.';
          image3.style.border = '2px solid #FF5050';
          image3.src = '../images/default_img/circleDrop.jpg';
          prod_images3 = '';
        }
        else if (prod_images2 == ''){
          document.getElementById('imageError').innerHTML = 'Please, drop an image first in the "Image 2" section.';
          image3.style.border = '2px solid #FF5050';
          image2.style.border = '2px solid #00E672';
          image3.src = '../images/default_img/circleDrop.jpg';
          prod_images3 = '';
        }
        else{
          var formData = new FormData();
          var xhr = new XMLHttpRequest();
          for (var x = 0; x < files.length; x++) {
              formData.append('file[]', files[x]);
             }
          xhr.onload = function(){
                            var data = JSON.parse(this.responseText);
                            displayUploads(data);
                        }
          xhr.open('post', base+'/shop/upload');
          xhr.send(formData);
          }
        }
      image3.ondrop = function(e){
      e.preventDefault();
      upload(e.dataTransfer.files)
      }
      image3.onclick = function(e){
      e.preventDefault();
      var imageUpload = document.getElementById('file3');
      imageUpload.click();
          imageUpload.onchange = function(e){
            upload(e.target.files);
          }
      }
      image3.ondragover = function(){
      image3.style.border = '2px dashed #4BA6FF';
      document.getElementById('imageError').innerHTML = '';
      image2.style.border = '2px solid #4BA6FF';
      image4.style.border = '2px solid #4BA6FF';
      image5.style.border = '2px solid #4BA6FF';
      return false;
      }
      image3.ondragleave = function(){
      image3.style.border = '2px solid #4BA6FF';
      return false;
      }
      image3.onmouseover = function(){
        if (prod_images3 != '') {
          image1.src = prod_images3;
          image3.src = prod_images1;
        }
      }
      image3.onmouseleave = function(){
        if (prod_images3 != '') {
          image1.src = prod_images1;
          image3.src = prod_images3;
        }
      }
  }());
/////////////////////////////////////// Image 4 ////////////////////////////////////////
  (function (){
      var image1 = document.getElementById('dropzone');
      var image2 = document.getElementById('sec_image');
      var image3 = document.getElementById('third_image');
      var image4 = document.getElementById('fourth_image');
      var image5 = document.getElementById('fifth_image');
      var fourthImage = document.getElementById('image4');
      prod_images4 = '';
      var displayUploads = function(data){
                  var loader = '../images/default_img/default (7).svg';
                  image4.style.padding = '10px';
                  image4.src = loader;
                  document.getElementById('imageError').innerHTML = '';
                  image1.style.border = '3px solid #4BA6FF';
                  image2.style.border = '2px solid #4BA6FF';
                  image3.style.border = '2px solid #4BA6FF';
                  image4.style.border = '2px solid #4BA6FF';
                  image5.style.border = '2px solid #4BA6FF';
                  setTimeout(function(){
                    image4.style.padding = '0px';
                    image4.src = '';
                    image4.src = data[0].file;
                    prod_images4 = data[0].file;
                    fourthImage.value = data[0].name },3000)

     }
      var upload = function(files){
        var imageType = files[0].type;
        var imageSize = files[0].size;
        var typeImg = imageType.substring(imageType.lastIndexOf("/") + 1).toLowerCase();
        if (files.length > 1) {
          document.getElementById('imageError').innerHTML = 'Please drop only one image';
          image4.style.border = '2px solid #FF5050';
          image4.src = '../images/default_img/circleDrop.jpg';
          prod_images4 = '';
        }
        else if (typeImg != 'jpeg' && typeImg != 'jpg' && typeImg != 'png' && typeImg != 'gif' && typeImg != 'bmp') {
          document.getElementById('imageError').innerHTML = 'Only images with jpg, gif, png, jpeg and bmp format is allowed.';
          image4.style.border = '2px solid #FF5050';
          image4.src = '../images/default_img/circleDrop.jpg';
          prod_images4 = '';
        }
        else if (imageSize > 1000000) {
          document.getElementById('imageError').innerHTML = 'Sorry, this file is too large.';
          image4.style.border = '2px solid #FF5050';
          image4.src = '../images/default_img/circleDrop.jpg';
          prod_images4 = '';
        }
        else if (prod_images3 == ''){
          document.getElementById('imageError').innerHTML = 'Please, drop an image first in the "Image 3" section.';
          image4.style.border = '2px solid #FF5050';
          image3.style.border = '2px solid #00E672';
          image4.src = '../images/default_img/circleDrop.jpg';
          prod_images4 = '';
        }
        else{
          var formData = new FormData();
          var xhr = new XMLHttpRequest();
          for (var x = 0; x < files.length; x++) {
              formData.append('file[]', files[x]);
             }
          xhr.onload = function(){
                            var data = JSON.parse(this.responseText);
                            displayUploads(data);
                        }
          xhr.open('post', base+'/shop/upload');
          xhr.send(formData);
          }
        }
      image4.ondrop = function(e){
      e.preventDefault();
      upload(e.dataTransfer.files)
      }
      image4.onclick = function(e){
      e.preventDefault();
      var imageUpload = document.getElementById('file4');
      imageUpload.click();
          imageUpload.onchange = function(e){
            upload(e.target.files);
          }
      }
      image4.ondragover = function(){
      image4.style.border = '2px dashed #4BA6FF';
      document.getElementById('imageError').innerHTML = '';
      image2.style.border = '2px solid #4BA6FF';
      image3.style.border = '2px solid #4BA6FF';
      image5.style.border = '2px solid #4BA6FF';
      return false;
      }
      image4.ondragleave = function(){
      image4.style.border = '2px solid #4BA6FF';
      return false;
      }
      image4.onmouseover = function(){
        if (prod_images4 != '') {
          image1.src = prod_images4;
          image4.src = prod_images1;
        }
      }
      image4.onmouseleave = function(){
        if (prod_images4 != '') {
          image1.src = prod_images1;
          image4.src = prod_images4;
        }
      }
  }());
/////////////////////////////////////// Image 5 ////////////////////////////////////////
  (function (){
      var image1 = document.getElementById('dropzone');
      var image2 = document.getElementById('sec_image');
      var image3 = document.getElementById('third_image');
      var image4 = document.getElementById('fourth_image');
      var image5 = document.getElementById('fifth_image');
      var fifthmage = document.getElementById('image5');
      prod_images5 = '';
      var displayUploads = function(data){
                  var loader = '../images/default_img/default (7).svg';
                  image5.style.padding = '10px';
                  image5.src = loader;
                  document.getElementById('imageError').innerHTML = '';
                  image1.style.border = '3px solid #4BA6FF';
                  image2.style.border = '2px solid #4BA6FF';
                  image3.style.border = '2px solid #4BA6FF';
                  image4.style.border = '2px solid #4BA6FF';
                  image5.style.border = '2px solid #4BA6FF';
                  setTimeout(function(){
                    image5.style.padding = '0px';
                    image5.src = '';
                    image5.src = data[0].file;
                    prod_images5 = data[0].file;
                    fifthmage.value = data[0].name },3000)

     }
      var upload = function(files){
        var imageType = files[0].type;
        var imageSize = files[0].size;
        var typeImg = imageType.substring(imageType.lastIndexOf("/") + 1).toLowerCase();
        if (files.length > 1) {
          document.getElementById('imageError').innerHTML = 'Please drop only one image';
          image5.style.border = '2px solid #FF5050';
          image5.src = '../images/default_img/circleDrop.jpg';
          prod_images5 = '';
        }
        else if (typeImg != 'jpeg' && typeImg != 'jpg' && typeImg != 'png' && typeImg != 'gif' && typeImg != 'bmp') {
          document.getElementById('imageError').innerHTML = 'Only images with jpg, gif, png, jpeg and bmp format is allowed';
          image5.style.border = '2px solid #FF5050';
          image5.src = '../images/default_img/circleDrop.jpg';
          prod_images5 = '';
        }
        else if (imageSize > 1000000) {
          document.getElementById('imageError').innerHTML = 'Sorry, this file is too large.';
          image5.style.border = '2px solid #FF5050';
          image5.src = '../images/default_img/circleDrop.jpg';
          prod_images5 = '';
        }
        else if (prod_images4 == ''){
          document.getElementById('imageError').innerHTML = 'Please, drop an image first in the "Image 4" section.';
          image5.style.border = '2px solid #FF5050';
          image4.style.border = '2px solid #00E672';
          image5.src = '../images/default_img/circleDrop.jpg';
          prod_images5 = '';
        }
        else{
          var formData = new FormData();
          var xhr = new XMLHttpRequest();
          for (var x = 0; x < files.length; x++) {
              formData.append('file[]', files[x]);
             }
          xhr.onload = function(){
                            var data = JSON.parse(this.responseText);
                            displayUploads(data);
                        }
          xhr.open('post', base+'/shop/upload');
          xhr.send(formData);
          }
        }
      image5.ondrop = function(e){
      e.preventDefault();
      upload(e.dataTransfer.files)
      }
      image5.onclick = function(e){
      e.preventDefault();
      var imageUpload = document.getElementById('file5');
      imageUpload.click();
          imageUpload.onchange = function(e){
            upload(e.target.files);
          }
      }
      image5.ondragover = function(){
      image5.style.border = '2px dashed #4BA6FF';
      document.getElementById('imageError').innerHTML = '';
      image2.style.border = '2px solid #4BA6FF';
      image3.style.border = '2px solid #4BA6FF';
      image4.style.border = '2px solid #4BA6FF';

      return false;
      }
      image5.ondragleave = function(){
      image5.style.border = '2px dashed #4BA6FF';
      return false;
      }
      image5.onmouseover = function(){
        if (prod_images5 != '') {
          image1.src = prod_images5;
          image5.src = prod_images1;
        }
      }
      image5.onmouseleave = function(){
        if (prod_images5 != '') {
          image1.src = prod_images1;
          image5.src = prod_images5;
        }
      }
  }());

	function checkAddProducts(){
		var prodName = document.getElementById('prod_name').value;
		var trimProdName = prodName.trim();
		var getFirstLetter = trimProdName.charAt(0);
		var firstLetterToUpperCase = getFirstLetter.toUpperCase();
		var resultprodName = prodName.replace(getFirstLetter, firstLetterToUpperCase);
		if (prodName.length == 0) {
			document.getElementById('prod_nameError').innerHTML = 'Product name is required, please enter a valid product name';
			document.getElementById('prod_name').style.border = '1px solid #FF5050';
			finalProductName = resultprodName.trim();
		}
		else{
			document.getElementById('prod_name').value =  resultprodName.trim();
			finalProductName = resultprodName.trim();
			document.getElementById('prod_name').style.border = '1px solid green';
		}
	}
	function checkProdName(){
		var prodName = document.getElementById('prod_name').value;
		if (prodName.length >= 0) {
			document.getElementById('prod_nameError').innerHTML = '';
			document.getElementById('prod_name').style.border = '1px solid skyblue';
		}
	}
	function checkDetails(){
		var prodDetails = document.getElementById('details').value;
		if (prodDetails.length == 0) {
			document.getElementById('detailsError').innerHTML = 'Product detail is required, please enter some text';
			document.getElementById('details').style.border = '1px solid #FF5050';
		}
		else{
			var trimProdDetails = prodDetails.trim();
			var getFirstLetter = trimProdDetails.charAt(0);
			var firstLetterToUpperCase = getFirstLetter.toUpperCase();
			var resultprodName = prodDetails.replace(getFirstLetter, firstLetterToUpperCase);
			document.getElementById('details').value =  resultprodName.trim();
			finalProductDetails = resultprodName.trim();
			document.getElementById('details').style.border = '1px solid green';
		}
	}
	function checkProdDetails(){
		var prodDetails = document.getElementById('details').value;
		if (prodDetails.length >= 0) {
			document.getElementById('detailsError').innerHTML = '';
			document.getElementById('details').style.border = '1px solid skyblue';
		}
	}
	function firstSubOption(){
		var category = document.getElementById('category').value;
		if (category == 'Select') {
			document.getElementById('subcategoryError').innerHTML = 'Please select first the product category';
			document.getElementById('firstSubcategoryOption').style.border = '1px solid red';
		}
		if (category == 'clothing' || category == 'shoes' || category == 'bags' || category == 'sports' || category == 'accesories') {
			document.getElementById('subcategoryError').innerHTML = '';
		}
	}
	function prodSubcategory(){
		var category = document.getElementById('category').value;
		switch (category){
			case 'Clothing':
			document.getElementById('clothing').style.border = '1px solid green';
			document.getElementById('subcategoryError').innerHTML = '';
			finalProductSubcategory = document.getElementById('clothing').value;
			document.getElementById('forProdSub').value = finalProductSubcategory;
			break;
			case 'Shoes':
			document.getElementById('shoes').style.border = '1px solid green';
			document.getElementById('subcategoryError').innerHTML = '';
			finalProductSubcategory = document.getElementById('shoes').value;
			document.getElementById('forProdSub').value = finalProductSubcategory;
			break;
			case 'Bags':
			document.getElementById('bags').style.border = '1px solid green';
			document.getElementById('subcategoryError').innerHTML = '';
			finalProductSubcategory = document.getElementById('bags').value;
			document.getElementById('forProdSub').value = finalProductSubcategory;
			break;
			case 'Sports':
			document.getElementById('sports').style.border = '1px solid green';
			document.getElementById('subcategoryError').innerHTML = '';
			finalProductSubcategory = document.getElementById('sports').value;
			document.getElementById('forProdSub').value = finalProductSubcategory;
			break;
			case 'Accesories':
			document.getElementById('accesories').style.border = '1px solid green';
			document.getElementById('subcategoryError').innerHTML = '';
			finalProductSubcategory = document.getElementById('accesories').value;
			document.getElementById('forProdSub').value = finalProductSubcategory;
			break;
		}
	}
	function checkCategory(){
		var prodCategory = document.getElementById('category').value;
		switch(prodCategory){
			case 'Clothing':
			$(document).ready(function(){
    				$("#clothing").show();
    				$("#category").css("border","1px solid green");
    				$("#firstSubcategoryOption").hide();
    				$("#shoes").hide();
    				$("#bags").hide();
    				$("#sports").hide();
    				$("#accesories").hide();
    				finalProductCategory = 'Clothing';
			});
			var category = document.getElementById('category').value;
			if (category == 'Select') {
				document.getElementById('subcategoryError').innerHTML = 'Please select first the product category';
				document.getElementById('firstSubcategoryOption').style.border = '1px solid red';
			}
			if (category == 'Clothing' || category == 'Shoes' || category == 'Bags' || category == 'Sports' || category == 'Accesories') {
				document.getElementById('subcategoryError').innerHTML = '';
			}
			$("#productSize").slideDown("slow");
			$("#productSizeForShoes").slideUp("slow");
			document.getElementById('categoryError').innerHTML = '';
			break;
			case 'Shoes':
			$(document).ready(function(){
    				$("#shoes").show();
    				$("#category").css("border","1px solid green");
    				$("#firstSubcategoryOption").hide();
    				$("#clothing").hide();
    				$("#bags").hide();
    				$("#sports").hide();
    				$("#accesories").hide();
    				finalProductCategory = 'Shoes';
			});
			var category = document.getElementById('category').value;
			if (category == 'Select') {
				document.getElementById('subcategoryError').innerHTML = 'Please select first the product category';
				document.getElementById('firstSubcategoryOption').style.border = '1px solid #FF5050';
			}
			if (category == 'Clothing' || category == 'Shoes' || category == 'Bags' || category == 'Sports' || category == 'Accesories') {
				document.getElementById('subcategoryError').innerHTML = '';
			}
			$("#productSizeForShoes").slideDown("slow");
			$("#productSize").slideUp("slow");
			document.getElementById('categoryError').innerHTML = '';
			break;
			case 'Bags':
			$(document).ready(function(){
    				$("#bags").show();
    				$("#category").css("border","1px solid green");
    				$("#firstSubcategoryOption").hide();
    				$("#clothing").hide();
    				$("#shoes").hide();
    				$("#sports").hide();
    				$("#accesories").hide();
    				finalProductCategory = 'Bags';
			});
			var category = document.getElementById('category').value;
			if (category == 'Select') {
				document.getElementById('subcategoryError').innerHTML = 'Please select first the product category';
				document.getElementById('firstSubcategoryOption').style.border = '1px solid #FF5050';
			}
			if (category == 'Clothing' || category == 'Shoes' || category == 'Bags' || category == 'Sports' || category == 'Accesories') {
				document.getElementById('subcategoryError').innerHTML = '';
			}
			$("#productSize").slideUp("slow");
			$("#productSizeForShoes").slideUp("slow");
			document.getElementById('categoryError').innerHTML = '';
			break;
			case 'Sports':
			$(document).ready(function(){
    				$("#sports").show();
    				$("#category").css("border","1px solid green");
    				$("#firstSubcategoryOption").hide();
    				$("#clothing").hide();
    				$("#shoes").hide();
    				$("#bags").hide();
    				$("#accesories").hide();
    				finalProductCategory = 'Sports';
			});
			var category = document.getElementById('category').value;
			if (category == 'Select') {
				document.getElementById('subcategoryError').innerHTML = 'Please select first the product category';
				document.getElementById('firstSubcategoryOption').style.border = '1px solid #FF5050';
			}
			if (category == 'Clothing' || category == 'Shoes' || category == 'Bags' || category == 'Sports' || category == 'Accesories') {
				document.getElementById('subcategoryError').innerHTML = '';
			}
			$("#productSize").slideUp("slow");
			$("#productSizeForShoes").slideUp("slow");
			document.getElementById('categoryError').innerHTML = '';
			break;
			case 'Accesories':
			$(document).ready(function(){
    				$("#accesories").show();
    				$("#category").css("border","1px solid green");
    				$("#firstSubcategoryOption").hide();
    				$("#clothing").hide();
    				$("#shoes").hide();
    				$("#bags").hide();
    				$("#sports").hide();
    				finalProductCategory = 'Accesories';
			});
			var category = document.getElementById('category').value;
			if (category == 'Select') {
				document.getElementById('subcategoryError').innerHTML = 'Please select first the product category';
				document.getElementById('firstSubcategoryOption').style.border = '1px solid #FF5050';
			}
			if (category == 'Clothing' || category == 'Shoes' || category == 'Bags' || category == 'Sports' || category == 'Accesories') {
				document.getElementById('subcategoryError').innerHTML = '';
			}
			$("#productSize").slideUp("slow");
			$("#productSizeForShoes").slideUp("slow");
			document.getElementById('categoryError').innerHTML = '';
			break;
		}
	}
	function checkBrandName(){
		var prodBrandName = document.getElementById('brand').value;
		if (prodBrandName.length == 0) {
			document.getElementById('brandNameError').innerHTML = 'Brand Name is required please enter a value';
			document.getElementById('brand').style.border = '1px solid #FF5050';
		}
		else{
			var trimProdBrandName = prodBrandName.trim();
			var getFirstLetter = trimProdBrandName.charAt(0);
			var firstLetterToUpperCase = getFirstLetter.toUpperCase();
			var resultprodName = prodBrandName.replace(getFirstLetter, firstLetterToUpperCase);
			document.getElementById('brand').value =  resultprodName.trim();
			finalProductBrandName = resultprodName.trim();
			document.getElementById('brand').style.border = '1px solid green';
		}
	}
	function checkProdBrandName(){
		var prodBrandName = document.getElementById('brand').value;
		if (prodBrandName.length >= 0) {
			document.getElementById('brandNameError').innerHTML = '';
			document.getElementById('brand').style.border = '1px solid skyblue';
		}
	}
	function prodPrice(){
		var productPrice = document.getElementById('price').value;
    var priceSetStyle = document.getElementById('price');
    priceSetStyle.style.border = '';
    priceSetStyle.style.backgroundColor = 'white';
    priceSetStyle.style.textDecoration =  '';
		if (isNaN(productPrice)) {
			document.getElementById('priceError').innerHTML = 'Only valid number is allowed';
			document.getElementById('price').style.border = '1px solid #FF5050';
		}
		else{
			document.getElementById('priceError').innerHTML = '';
			document.getElementById('price').style.border = '1px solid skyblue';
		}
	}
	function prodPriceEmpty(){
		var productPrice = document.getElementById('price').value;
		var convertToNumber = parseFloat(productPrice);
		var resultProdPrice = convertToNumber.toFixed(2);
		if (productPrice.length == 0) {
			document.getElementById('priceError').innerHTML = 'Product price is a required field';
			document.getElementById('price').style.border = '1px solid #FF5050';
		}
		if (!isNaN(productPrice) && productPrice.length > 0) {
			document.getElementById('price').value = resultProdPrice;
			document.getElementById('forProdPrice').value = productPrice;
			finalProductPrice = resultProdPrice;
			document.getElementById('price').style.border = '1px solid green';
      var activatePriceDiscount = document.getElementById('priceDiscount');
      activatePriceDiscount.readOnly = false;
		}
	}
  (function (){
    var disablePriceDiscount = document.getElementById('priceDiscount');
    disablePriceDiscount.readOnly = true;
  }());
  function checkDiscount(){
    var productPrice = document.getElementById('price').value;
    var priceDiscount = document.getElementById('priceDiscount').value;
    var price = document.getElementById('price');
    if (productPrice.length <= 0) {
      document.getElementById('discountError').innerHTML = 'Please first enter the value of product price';
      document.getElementById('priceDiscount').style.border = '1px solid #FF5050';
      document.getElementById('forPriceDiscount').value = '';
      document.getElementById('forPriceOff').value = '';
    }
    else if (isNaN(productPrice)) {
      document.getElementById('discountError').innerHTML = 'Please enter enter a valid product price';
      document.getElementById('priceDiscount').style.border = '1px solid #FF5050';
      document.getElementById('forPriceDiscount').value = '';
      document.getElementById('forPriceOff').value = '';
    }
    else if (isNaN(priceDiscount)) {
      document.getElementById('discountError').innerHTML = 'Please enter enter a valid discount price';
      document.getElementById('priceDiscount').style.border = '1px solid #FF5050';
      document.getElementById('forPriceDiscount').value = '';
      document.getElementById('forPriceOff').value = '';
    }
    else if (priceDiscount.length <= 0) {
      document.getElementById('pricePercentOff').value = '';
      document.getElementById('forPriceDiscount').value = '';
      document.getElementById('forPriceOff').value = '';
    }
    else if (priceDiscount.length > 0 && !isNaN(priceDiscount)) {
      var priceOff = priceDiscount / productPrice;
      var resultprice_OFF = priceOff * 100;
      var resultpriceOff = 100 - resultprice_OFF;
      document.getElementById('pricePercentOff').value = Math.round(resultpriceOff);
      document.getElementById('forPriceOff').value = Math.round(resultpriceOff);
      document.getElementById('discountError').innerHTML = '';
      document.getElementById('priceDiscount').style.border = '1px solid skyblue';
    }
  }
  function discountGreaterThanPrice(){
    var productPrice = document.getElementById('price').value;
    var priceDiscount = document.getElementById('priceDiscount').value;
    var prod_Price = parseInt(productPrice);
    var prod_Discount = parseInt(priceDiscount);
    if (productPrice.length > 0 && !isNaN(productPrice) && prod_Discount > prod_Price) {
      document.getElementById('discountError').innerHTML = 'Input invalid, discount price is greater than product price!';
      document.getElementById('priceDiscount').style.border = '1px solid #FF5050';
      document.getElementById('pricePercentOff').value = '';
      document.getElementById('forPriceDiscount').value = '';
      document.getElementById('forPriceOff').value = '';
      document.getElementById('price').style.border = '';
      document.getElementById('price').style.backgroundColor = '';
      document.getElementById('price').style.textDecoration =  '';
    }
    if (priceDiscount.length > 0 && !isNaN(priceDiscount) && prod_Discount <= prod_Price){
          var resultprod_Discount = prod_Discount.toFixed(2);
          document.getElementById('priceDiscount').value = resultprod_Discount;
          document.getElementById('forPriceDiscount').value = priceDiscount;
          document.getElementById('priceDiscount').style.border = '1px solid green';
          document.getElementById('price').style.border = '1px solid #FF5050';
          document.getElementById('price').style.backgroundColor = 'rgba(255,0,0, 0.2)';
          document.getElementById('price').style.textDecoration =  'line-through';
    }
  }
	function prodStocks(){
		var productStocks = document.getElementById('stocks').value
		if (productStocks.length <= 0) {
			document.getElementById('stocksError').innerHTML = 'Please enter the total number of stocks';
			document.getElementById('stocks').style.border = '1px solid #FF5050';
		}
		if (productStocks.length > 0 && productStocks > 0){
			document.getElementById('stocksError').innerHTML = '';
			finalProductStocks = productStocks;
			document.getElementById('stocks').style.border = '1px solid green';
		}
	}
	function prodStocksNegative(){
		var productStocks = document.getElementById('stocks').value
		if (productStocks <= 0) {
			document.getElementById('stocksError').innerHTML = 'Please enter a valid stocks number';
			document.getElementById('stocks').style.border = '1px solid #FF5050';
		}else{
			document.getElementById('stocksError').innerHTML = '';
			document.getElementById('stocks').style.border = '1px solid skyblue';
		}
	}
	function prodSpecification(){
		var productSpecification = document.getElementById('prod_specification').value;
		if (productSpecification.length > 0) {
			var trimProductSpecification = productSpecification.trim();
			var getFirstLetter = trimProductSpecification.charAt(0);
			var firstLetterToUpperCase = getFirstLetter.toUpperCase();
			var resultprodName = productSpecification.replace(getFirstLetter, firstLetterToUpperCase);
			document.getElementById('prod_specification').value =  resultprodName.trim();
			var slideDownAdd = document.getElementById('addSpec');
			$(slideDownAdd).slideDown("slow");
		}
	}
	function checkProdSpecification(){
		var productSpecification = document.getElementById('prod_specification').value;
		if (productSpecification.length > 0){
			document.getElementById('prod_specificationError').innerHTML = '';
			document.getElementById('prod_specification').style.border = '1px solid skyblue';
			var slideDownAdd = document.getElementById('addSpec');
			$(slideDownAdd).slideDown("slow");
		}
	}
	function addProdSpecificationMax10(){
		if (specList.length >= 10) {
			document.getElementById('prod_specificationError').innerHTML = '';
			document.getElementById('prod_specification').style.border = '1px solid green';
			document.getElementById('prod_specification').value = '';
		}
	}
	function addProdSpecification(){
		var productSpecification = document.getElementById('prod_specification').value;
		if (productSpecification.length <= 0) {
			$("#prod_specificationError").fadeIn("slow");
			document.getElementById('prod_specificationError').innerHTML = 'Please, enter some product specification in this text field <br>';
			document.getElementById('prod_specification').style.border = '1px solid #FF5050';
			document.getElementById('prod_specificationError').style.color = "#FF5050";
		}
		if (specList.length >= 10) {
			$("#prod_specificationError").fadeIn("slow");
			document.getElementById('prod_specificationError').innerHTML = 'Maximum product specification is 10<br>';
			document.getElementById('prod_specification').style.border = '1px solid #FF5050';
			document.getElementById('prod_specificationError').style.color = "#FF5050";
		}
		if (productSpecification.length > 0 && specList.length < 10){
			$("#prod_specificationError").slideDown("slow");
			var count =	$("#prodSpecificationLists li").length;
			forInputCount = forInputCount + 1;
			var createDivWrapper = document.createElement("div");
			var createNewProdList = document.createElement("li");
			var createNewProdInput = document.createElement("button");
			var createNewProdSpan = document.createElement("span");
			var createHiddenInput = document.createElement("input");
			$(createDivWrapper).attr("class","col-sm-11");
			createDivWrapper.style.display = "none";
			$(createNewProdList).attr("id","countList".concat(count));
			$(createNewProdSpan).attr("class","glyphicon glyphicon-trash");
			$(createNewProdInput).attr("id",count);
			createNewProdInput.innerHTML = 'Remove ';
			$(createNewProdInput).attr("type","button");
			$(createNewProdInput).attr("class","btn btn-xs btn-danger");
			$(createNewProdInput).attr("onclick",'removeProductSpecification($(this))');
			$(createHiddenInput).attr("type","hidden");
			$(createHiddenInput).attr("value",productSpecification);
			$(createHiddenInput).attr("name","spec".concat(forInputCount));
			var prouctSpec = document.getElementById('prodSpecificationLists');
			var node = document.createTextNode(productSpecification);
			createNewProdInput.appendChild(createNewProdSpan);
			createNewProdList.appendChild(node);
			createDivWrapper.appendChild(createNewProdList);
			createDivWrapper.appendChild(createNewProdInput);
			createDivWrapper.appendChild(createHiddenInput);
			prouctSpec.appendChild(createDivWrapper);
			$(createDivWrapper).slideDown("slow");
			if (specList.length == 0) {
				specList[specList.length] = productSpecification;
				document.getElementById('prod_specification').value = '';
				$("#prod_specificationError").fadeOut("slow");
				$("#addSpec").fadeIn("slow");
			}else{
				var end = 'false';
				for (var i = 0; i < specList.length; i++) {
					if (specList[i] == productSpecification) {
						document.getElementById('prod_specificationError').innerHTML = 'Sorry dude, this product specification is already existing';
						document.getElementById('prod_specification').style.border = '1px solid #FF5050';
						document.getElementById('prod_specificationError').style.color = "#FF5050";
						$("#prod_specificationError").fadeIn("slow");
						var end = 'true';
					}
				}
				if (end == 'false') {
					specList[specList.length] = productSpecification;
					document.getElementById('prod_specification').value = '';
					$("#prod_specificationError").fadeOut("slow");
					$("#addSpec").fadeIn("slow");
				}else{
					createDivWrapper.remove();
				}
			}
		}
	} //$("#prodSpecificationLists li").text()
	function removeProductSpecification($scope){
		var me = $scope.prev();
		var removeProductListing = $scope.parent();
		for (var i = 0; i < specList.length; i++) {
			if (specList[i] == $(me).text()) {
				specList.splice(i, 1);
			}
			$(removeProductListing).hide("slow");
			removeProductListing.remove();
		}
	}
	function maximumColorAllowed(){
		if (color.length >= 10) {
			document.getElementById('colorError').innerHTML = '';
			document.getElementById('prod_color').style.border = '1px solid green';
			document.getElementById('prod_color').value = '';
		}
	}
	function toUpperCaseColor(){
		var productColor = document.getElementById('prod_color').value;
		if (productColor.length > 0) {
			var trimProductColor = productColor.trim();
			var getFirstLetter = trimProductColor.charAt(0);
			var firstLetterToUpperCase = getFirstLetter.toUpperCase();
			var resultprodColor = productColor.replace(getFirstLetter, firstLetterToUpperCase);
			document.getElementById('prod_color').value =  resultprodColor.trim();
			var slideDownAdd = document.getElementById('colorOnClick');
			$(slideDownAdd).slideDown("slow");
		}
	}
	function checkColor(){
		var productColor = document.getElementById('prod_color').value;
		var searchForNumber = productColor.split("");
		var colorValid = 'true';
		for (var i = 0; i < searchForNumber.length; i++) {
			if (!isNaN(searchForNumber[i])) {
				document.getElementById('colorError').innerHTML = 'Please enter a valid product color, numbers is not allowed';
				document.getElementById('prod_color').style.border = '1px solid #FF5050';
				colorValid = 'false';
				var slideDownAdd = document.getElementById('colorOnClick');
				$(slideDownAdd).slideDown("slow");
				var slideDownColorError = document.getElementById('colorError');
				slideDownColorError.style.color = "#FF5050";
				$(slideDownColorError).slideDown("slow");
			}
		}
		if (colorValid == 'true') {
			document.getElementById('colorError').innerHTML = '';
			document.getElementById('prod_color').style.border = '1px solid skyblue';
			var slideDownAdd = document.getElementById('colorOnClick');
			$(slideDownAdd).slideDown("slow");
		}
	}
	function checkProductColor(){
		var productColor = document.getElementById('prod_color').value;
		var proColor = document.getElementById('addProductColor');
		var searchForNumber = productColor.split("");
		var colorValid = 'true';
		colorCount = colorCount + 1;
		if (productColor.length == 0) {
			document.getElementById('colorError').innerHTML = 'Please, enter first a product color';
			document.getElementById('prod_color').style.border = '1px solid #FF5050';
			var slideDownAdd = document.getElementById('colorOnClick');
			$(slideDownAdd).slideDown("slow");
			var slideDownColorError = document.getElementById('colorError');
			slideDownColorError.style.color = "#FF5050";
			$(slideDownColorError).slideDown("slow");
		}
		for (var i = 0; i < searchForNumber.length; i++) {
			if (!isNaN(searchForNumber[i])) {
				colorValid = 'false';
			}
		}
		if (colorValid == 'false' || productColor.length == 2 || productColor.length == 1) {
			document.getElementById('colorError').innerHTML = 'Please enter a valid color name';
			document.getElementById('prod_color').style.border = '1px solid red';
			var slideDownAdd = document.getElementById('colorOnClick');
			$(slideDownAdd).slideDown("slow");
			var slideDownColorError = document.getElementById('colorError');
			slideDownColorError.style.color = "#FF5050";
			$(slideDownColorError).slideDown("slow");
		}
		if (color.length >= 10) {
			$("#prod_specificationError").fadeIn("slow");
			document.getElementById('colorError').innerHTML = 'Maximum product color allowed is 10<br>';
			document.getElementById('prod_color').style.border = '1px solid #FF5050';
			document.getElementById('colorError').style.color = "#FF5050";
		}
		if (colorValid == 'true' && productColor.length > 2 && color.length < 10){
			var divColorWrapper = document.createElement("div");
			$(divColorWrapper).attr("class",'pull-left');
			divColorWrapper.style.display = "none";
			var canvas = document.createElement("canvas");
			$(canvas).css({"background-color":productColor,"border":".1px solid gray","width":"27","height":"30"});
			$(canvas).attr("id",productColor);
			var span = document.createElement("span");
      span.style.color = 'gray';
      $(span).attr("id","spanColor");
			$(span).css("margin-right","10px");
			$(span).attr("class",'glyphicon glyphicon-remove-circle');
			$(span).attr("onclick",'removeProductColor($(this))');
			var inputHiddenForColor = document.createElement("input");
			$(inputHiddenForColor).attr("type","hidden");
			$(inputHiddenForColor).attr("value",productColor);
			$(inputHiddenForColor).attr("name","color".concat(colorCount));
			divColorWrapper.appendChild(canvas);
			divColorWrapper.appendChild(span);
			divColorWrapper.appendChild(inputHiddenForColor);
			proColor.appendChild(divColorWrapper);
			$(divColorWrapper).slideDown("slow");
			var slideDownAdd = document.getElementById('colorOnClick');
			$(slideDownAdd).slideDown("slow");
			if (color.length == 0) {
				color[color.length] = productColor;
				document.getElementById('prod_color').value = '';
			}else{
				var end = 'false';
				for (var i = 0; i < color.length; i++) {
					if (color[i] == productColor) {
						document.getElementById('colorError').innerHTML = 'This color is already existing';
						document.getElementById('prod_color').style.border = '1px solid #FF5050';
						var end = 'true';
						var slideDownColorError = document.getElementById('colorError');
						slideDownColorError.style.color = "#FF5050";
						$(slideDownColorError).slideDown("slow");
					}
				}
				if (end == 'false') {
					color[color.length] = productColor;
					document.getElementById('prod_color').value = '';
				}else{
					divColorWrapper.remove();
				}
			}
		}
	}
	function removeProductColor($scope){
		var removeColor = $scope.parent();
		var canvasRemove = $scope.prev();
		var idOfCanvas = ($(canvasRemove).attr("id"));
		for (var i = 0; i < color.length; i++) {
			if (color[i] == idOfCanvas) {
				color.splice(i, 1);
			}
		}
			$(removeColor).slideUp("slow");
			removeColor.remove();
	}
	function checkSize($scope){
		var checkId = $scope.attr("id");
		$("#sizeClothingDiv").fadeOut("slow");
		clothSize = clothSize + 1;
		if (checkId == undefined) {
			var on = $scope.attr("id","on");
			$scope.attr("name","clothName".concat(clothSize));
			var valueOfSize = $scope.attr("value");
			size[size.length] = valueOfSize;
		}
		if (checkId == 'on') {
			var off = $scope.attr("id","off");
			$scope.attr("name","");
			var removeSizeFromArray = $scope.attr("value");
			for (var i = 0; i < size.length; i++) {
				if (size[i] == removeSizeFromArray) {
					size.splice(i, 1);
				}
			}
		}
		if (checkId == 'off') {
			var on = $scope.attr("id","on");
			$scope.attr("name","clothName".concat(clothSize));
			var valueOfSize2 = $scope.attr("value");
			size[size.length] = valueOfSize2;
		}
	}
	function checkShoeSize($scope){
		var checkId = $scope.attr("id");
		$("#sizeShoeDiv").fadeOut("slow");
		shoeSizeEx = shoeSizeEx + 1;
		if (checkId == undefined) {
			var on = $scope.attr("id","on");
			$scope.attr("name","shoeName".concat(shoeSizeEx));
			var valueOfSize = $scope.attr("value");
			shoeSize[shoeSize.length] = valueOfSize;
		}
		if (checkId == 'on') {
			var off = $scope.attr("id","off");
			$scope.attr("name","");
			var removeSizeFromArray = $scope.attr("value");
			for (var i = 0; i < shoeSize.length; i++) {
				if (shoeSize[i] == removeSizeFromArray) {
					shoeSize.splice(i, 1);
				}
			}
		}
		if (checkId == 'off') {
			var on = $scope.attr("id","on");
			$scope.attr("name","shoeName".concat(shoeSizeEx));
			var valueOfSize2 = $scope.attr("value");
			shoeSize[shoeSize.length] = valueOfSize2;
		}
	}
	function specificationContinueOrNot($scope){
		var countinueSpecOrNot = $("#addSpec").attr("href");
		var checkYesOrNo = $scope.attr("value");
		if (checkYesOrNo == 'Yes') {
			$("#addSpec").attr("href","yes");
			var yes = document.getElementById('prod_specificationError');
			$(yes).fadeOut("slow");
			document.getElementById('prod_specification').style.border = '1px solid green';
			var hideAddSpec = document.getElementById('addSpec');
			$(hideAddSpec).slideDown("slow");
		}else{
			$("#addSpec").attr("href","no");
			$("#prod_specification").attr("autofocus");
			var no = document.getElementById('prod_specificationError');
			$(no).fadeOut("slow");
			document.getElementById('prod_specification').style.border = '1px solid skyblue';
      document.getElementById('prod_specification').focus();
			var hideAddSpec = document.getElementById('addSpec');
			$(hideAddSpec).slideDown("slow");
		}
	}
	function colorContinueOrNot($scope){
		var countinueColorOrNot = $("#colorOnClick").attr("href");
		var checkYesOrNo = $scope.attr("value");
		if (checkYesOrNo == 'Yes') {
			$("#colorOnClick").attr("href","yes");
			var yes = document.getElementById('colorError');
			$(yes).fadeOut("slow");
			document.getElementById('prod_color').style.border = '1px solid green';
			var hideAddColor = document.getElementById('colorOnClick');
			$(hideAddColor).slideDown("slow");
		}else{
			$("#colorOnClick").attr("href","no");
			$("#prod_color").attr("autofocus");
			var no = document.getElementById('colorError');
			$(no).fadeOut("slow");
			document.getElementById('prod_color').style.border = '1px solid skyblue';
      document.getElementById('prod_color').focus();
			var hideAddColor = document.getElementById('colorOnClick');
			$(hideAddColor).slideDown("slow");
		}
	}
	function previewProductData(){
		var countinueSpecOrNot = $("#addSpec").attr("href");
		var countinueColorOrNot = $("#colorOnClick").attr("href");
		var preview = 'success';
		var prod_preview = 'success';
    if (prod_images1 == '') {
      document.getElementById('imageError').innerHTML = 'Product image is required, please drop an image';
      var dropzoneError = document.getElementById('dropzone');
      dropzoneError.style.border = '2px solid #FF5050';
      dropzoneError.style.boxShadow = 'inset 2px -2px 8px #FF5050, inset -2px 2px 8px #FF5050';
      dropzoneError.style.color = '#FF5050';
      prod_preview = 'failed';
    }
		if (finalProductName.length <= 4){
			document.getElementById('prod_nameError').innerHTML = 'Product name is required, please enter a valid product name';
			document.getElementById('prod_name').style.border = '1px solid #FF5050';
			prod_preview = 'failed';
		}
		if (finalProductDetails.length <= 4) {
			document.getElementById('detailsError').innerHTML = 'Product details is required, please enter some valid details';
			document.getElementById('details').style.border = '1px solid #FF5050';
			prod_preview = 'failed';
		}
		if (countinueSpecOrNot == 'no') {
			if (specList.length == 0) {
				document.getElementById('prod_specificationError').style.color = '#008B8B';
				document.getElementById('prod_specificationError').innerHTML =
				'Are you sure, you don\'t want to add a product specification? <button type="button" title="Continue without product specification." onclick="specificationContinueOrNot($(this))" class="btn btn-xs btn-danger" value="Yes" >Yes <span class="glyphicon glyphicon-ok"></span></button> <button type="button" title="Do not continue without product specification." onclick="specificationContinueOrNot($(this))" class="btn btn-xs btn-primary" value="No" >No <span class="glyphicon glyphicon-pencil"></span></button>';
				document.getElementById('prod_specification').style.border = '1px solid #008B8B';
				var hideAddSpec = document.getElementById('addSpec');
				$(hideAddSpec).slideUp("slow");
				$(document.getElementById('prod_specificationError')).slideDown("slow");
				prod_preview = 'failed';
			} //<input type="button" onclick="specificationContinueOrNot($(this))" class="btn btn-xs bg-primary" value="Yes">
		}//<input type="button" onclick="specificationContinueOrNot($(this))" class="btn btn-xs bg-primary" value="No">
		if (countinueColorOrNot == 'no') {
			if (color.length == 0) {
				document.getElementById('colorError').style.color = '#008B8B';
				document.getElementById('colorError').innerHTML =
				'Are you sure, you don\'t want to add a product color? <button type="button" title="Continue without product color." onclick="colorContinueOrNot($(this))" class="btn btn-xs btn-danger" value="Yes">Yes <span class="glyphicon glyphicon-ok"></span></button> <button type="button" title="Do not continue without product color." onclick="colorContinueOrNot($(this))" class="btn btn-xs btn-primary" value="No">No <span class="glyphicon glyphicon-pencil"></span></button>';
				document.getElementById('prod_color').style.border = '1px solid #008B8B';
				var hideAddColor = document.getElementById('colorOnClick');
				$(hideAddColor).slideUp("slow");
				$(document.getElementById('colorError')).slideDown("slow");
				prod_preview = 'failed';
			}//<input type="button" onclick="colorContinueOrNot($(this))" class="btn btn-xs bg-primary" value="Yes"> <input type="button" onclick="colorContinueOrNot($(this))" class="btn btn-xs bg-primary" value="No">
		}
		if (finalProductCategory == 'Clothing') {
			if (size.length == 0) {
				document.getElementById('clothingSizeError').innerHTML = 'Product size is required, please choose available sizes.';
				$("#sizeClothingDiv").slideDown("slow");
				prod_preview = 'failed';
			}
		}
		if (finalProductCategory == 'Shoes') {
			if (shoeSize.length == 0) {
				document.getElementById('shoeSizeError').innerHTML = 'Product size is required, please choose available sizes.';
				$("#sizeShoeDiv").fadeIn("slow");
				prod_preview = 'failed';
			}
		}
		if (finalProductCategory == 'Select' || finalProductCategory == '') {
			document.getElementById('categoryError').innerHTML = 'Product category is required, please choose a category.';
			document.getElementById('category').style.border = '1px solid #FF5050';
			prod_preview = 'failed';
		}

		if (finalProductSubcategory.length == 0) {
			document.getElementById('subcategoryError').innerHTML = 'Product subcategory is required, please choose a subcategory.';
			document.getElementById('firstSubcategoryOption').style.border = '1px solid #FF5050';
			document.getElementById('clothing').style.border = '1px solid #FF5050';
			document.getElementById('shoes').style.border = '1px solid #FF5050';
			document.getElementById('bags').style.border = '1px solid #FF5050';
			document.getElementById('sports').style.border = '1px solid #FF5050';
			document.getElementById('accesories').style.border = '1px solid #FF5050';
			prod_preview = 'failed';
		}else{
			if (finalProductCategory == 'Clothing') {
				if (finalProductSubcategory == 'Mens Clothing' || finalProductSubcategory == 'Womens Clothing') {
					preview = 'success';
				}else{
					document.getElementById('subcategoryError').innerHTML = 'Product subcategory is required, please choose a subcategory.';
					document.getElementById('clothing').style.border = '1px solid #FF5050';
					prod_preview = 'failed';
				}
			}
			if (finalProductCategory == 'Shoes') {
				if (finalProductSubcategory == 'Mens Shoes' || finalProductSubcategory == 'Womens Shoes') {
					preview = 'success';
				}else{
					document.getElementById('subcategoryError').innerHTML = 'Product subcategory is required, please choose a subcategory.';
					document.getElementById('shoes').style.border = '1px solid #FF5050';
					prod_preview = 'failed';
				}
			}
			if (finalProductCategory == 'Bags') {
				if (finalProductSubcategory == 'Backpack' || finalProductSubcategory == 'Sling Bags') {
					preview = 'success';
				}else{
					document.getElementById('subcategoryError').innerHTML = 'Product subcategory is required, please choose a subcategory.';
					document.getElementById('bags').style.border = '1px solid #FF5050';
					prod_preview = 'failed';
				}
			}
			if (finalProductCategory == 'Sports') {
				if (finalProductSubcategory == 'Skateboard' || finalProductSubcategory == 'Longboards') {
					preview = 'success';
				}else{
					document.getElementById('subcategoryError').innerHTML = 'Product subcategory is required, please choose a subcategory.';
					document.getElementById('sports').style.border = '1px solid #FF5050';
					prod_preview = 'failed';
				}
			}
			if (finalProductCategory == 'Accesories') {
				if (finalProductSubcategory == 'Anime Merchandise' || finalProductSubcategory == 'Caps' || finalProductSubcategory == 'Mugs' || finalProductSubcategory == 'Wallets' || finalProductSubcategory == 'Necklace' || finalProductSubcategory == 'Lanyards') {
					preview = 'success';
				}else{
					document.getElementById('subcategoryError').innerHTML = 'Product subcategory is required, please choose a subcategory.';
					document.getElementById('accesories').style.border = '1px solid #FF5050';
					prod_preview = 'failed';
				}
			}
		}

		if (finalProductBrandName.length > 4) {
			document.getElementById('brand').style.border = '1px solid green';
			preview = 'success';
		}else{
			document.getElementById('brandNameError').innerHTML = 'Product brand is required, please enter a valid brand name';
			document.getElementById('brand').style.border = '1px solid #FF5050';
			prod_preview = 'failed';
		}
		if (finalProductPrice.length > 1) {
			document.getElementById('price').style.border = '1px solid green';
			preview = 'success';
		}else{
			document.getElementById('priceError').innerHTML = 'Product price is required, please enter a valid price';
			document.getElementById('price').style.border = '1px solid #FF5050';
			prod_preview = 'failed';
		}
		if (finalProductStocks.length > 0) {
			document.getElementById('stocks').style.border = '1px solid green';
			preview = 'success';
		}else{
			document.getElementById('stocksError').innerHTML = 'Product stocks is required, please enter a valid stock number';
			document.getElementById('stocks').style.border = '1px solid #FF5050';
			prod_preview = 'failed';
		}

		if (preview == 'success' && prod_preview == 'success') {
			document.getElementById('addProdSubmit').submit();
      //var activateModal = document.getElementById('activateModal').click();
		}
		//document.getElementById('prod_nameError').innerHTML = finalProductName;
		/*document.getElementById('detailsError').innerHTML = finalProductDetails;
		document.getElementById('prodFinalCategory').innerHTML = finalProductCategory;
		document.getElementById('subcategoryError').innerHTML = finalProductSubcategory;
		document.getElementById('brandNameError').innerHTML = finalProductBrandName;
		document.getElementById('priceError').innerHTML = finalProductPrice;
		document.getElementById('stocksError').innerHTML = finalProductStocks;*/
	}
