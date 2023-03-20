// class ImgaeUplodedtoServer {

//     constructor({ url, id, w = 650, h = 650, shep = "rect", color = "#fff", mulit = false, lablename = "", iconolnly = false, icon = "", oldsrc = "" }) {
//         this.url = url;
//         this.id = id;
//         this.w = w;
//         this.h = h;
//         this.shep = shep;
//         this.color = color;
//         this.mulit = mulit;
//         this.lablename = lablename;
//         this.iconolnly = iconolnly;
//         this.icon = icon;
//         this.oldsrc = oldsrc;

//     }

//     print(x) {
//         console.log("from print = " + x)
//     }

//     create() {
//         var inputid = "'input" + this.id + "'";

//         var source = ' <div  class=" rounded-full"> ' +
//             ' <div class="relative pb-6 px-4 mb-4  mx-auto bg-white"> ' +
//             ' <button type="button" onclick="document.getElementById(' + inputid + ').click()"     class="btn btn-ghost bg-white  text-blue-700 rounded-lg  mt-2">' + this.lablename + '</button>' +
//             ' <input ' +
//             'class="imguploade hidden px-3  rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" ' +
//             ' name="input' + this.id + '" id="input' + this.id + '" type="file"  />  <input value="" id="value' + this.id + '" name="value' + this.id + '" type="hidden" />' +
//             ' <div class="flex flex-wrap" id="imgrow' + this.id + '"> ' +
//             ' <div class="flex-1 rounded-lg m-2 "> ' +
//             ' <div class="object-center mx-auto text-center  py-4 mb-4 "> ' +
//             ' <img id="imgsrc' + this.id + '" src="' + this.oldsrc + '"  class=" h-32 w-32 mx-auto rounded-full image-full"/> ' +
//             '</div>   </div> </div> </div> </div> ';
//         document.getElementById(this.id).innerHTML = source;
//         document.getElementById("input" + this.id).addEventListener('change', (e) => {
//             //console.log("length =  " + e.target.files.length + "     id aand src = " + this.oldsrc + " " + this.shep);
//             //this.print(e.target.files.length)

//             var data = this.convert_to_base64(e.target.files[0]);
//             var d = document.getElementById("value" + this.id).value;
//             console.log("the d ");
//             console.log(d);
//         });
//     }

//     convert_to_base64(e) {

//         var file = e;
//         var dataURL;
//         var height = this.h;
//         var width = this.w;
//         var color = this.color;
//         var input_id = this.id;
//         var mulit = this.mulit;
//         var url = this.url;

//         if (file.type == "image/jpeg" || file.type == "image/png" || file.type == "image/jpg" || file.type == "image/JPG") {
//             var reader = new FileReader();
//             reader.onload = function(readerEvent) {

//                 var image = new Image();
//                 image.onload = function(imageEvent) {
//                     //if (image.height < max_size)
//                     var max_size = height;

//                     if (image.height < max_size)
//                         max_size = 650;



//                     //   ma


//                     max_size = Number(max_size);
//                     var w = image.width;
//                     var h = image.height;

//                     if (w > h) {
//                         if (w > max_size) {
//                             h *= max_size / w;
//                             w = max_size;
//                         }
//                     } else {
//                         if (h > max_size) {
//                             w *= max_size / h;
//                             h = max_size;
//                         }
//                     }

//                     var canvas = document.createElement('canvas');
//                     canvas.width = w;
//                     canvas.height = h;
//                     var chim = max_size - h;
//                     var chwi = max_size - w;
//                     var ctx = canvas.getContext('2d');
//                     ctx.drawImage(image, 0, 0, w, h);
//                     ctx.fillStyle = color;
//                     canvas.id = 'red';
//                     var convasimg = document.createElement('canvas');
//                     convasimg.width = max_size + 5;
//                     convasimg.height = max_size + 5;
//                     // convasimg.id = 'con' + divid;
//                     var ctximg = convasimg.getContext('2d');
//                     ctximg.fillStyle = color;
//                     ctximg.fillRect(0, 0, max_size + 5, max_size + 5);
//                     ctximg.putImageData(ctx.getImageData(0, 0, max_size, max_size), chwi / 2, chim / 2, 0, 0, w, h);




//                     if (file.type == "image/jpeg" || file.type == "image/JPG") {
//                         dataURL = convasimg.toDataURL("image/jpeg", 1);
//                     } else {
//                         dataURL = convasimg.toDataURL("image/png");
//                     }



//                     var dataUrl = '"' + dataURL + '"';
//                     console.log(dataURL);
//                     document.getElementById("value" + input_id).value = dataURL;

//                     var imagView = ' <div class="flex-1 rounded-lg m-2 "> ' +
//                         ' <div class="object-center mx-auto text-center  py-4 mb-4 "> ' +
//                         '<div class=" h-32 w-32 mx-auto rounded-full image-full"></div> ' +
//                         '</div>   </div>';

//                     var rowelemnt = document.getElementById('imgrow' + input_id);
//                     console.log(rowelemnt.innerHTML);
//                     convasimg.classList.add('w-32');
//                     convasimg.classList.add('flex');

//                     console.log(rowelemnt.lastElementChild.innerHTML)
//                     if (mulit == false)
//                         rowelemnt.lastElementChild.lastElementChild.innerHTML = '';

//                     var but = "<button class='btn uploadebtn btn-ghost btn-sm' onclick='upLoad(" + dataURL + "," + url + "," + input_id + ",$(this)," + "value" + input_id + ")'> تاكيد</button>";
//                     rowelemnt.lastElementChild.lastElementChild.appendChild(convasimg);
//                     $("#imgrow").lastElementChild.appendChild(but);




//                     //var url = '"' + urll + '"';
//                     //var input_id = '"' + inputimg.id + '"';
//                     //var inputnamee = '"' + inputname + '"';

//                     // <div class="">
//                     //var imageshow = "<div id='imgview" + count + "' class='flex-1 rounded-lg border-blue-600 border m-2 '><div class='object-center mx-auto text-center ' ><button class='btn uploadebtn btn-ghost btn-sm' onclick='upLoad(" + dataUrl + "," + url + "," + input_id + ",$(this)," + inputnamee + ")'> تاكيد</button> </div></div>";
//                     //                var im = "";


//                     // $("#" + id).parent().parent()

//                     // console.log(inputimg.id);
//                     // if ($("#" + inputimg.id).attr('multiple') === undefined) {
//                     //     //              $("#" + id).parent().html(convasimg).append(im);
//                     //     $("#" + id).html(imageshow);
//                     //     $("#imgview" + count++).prepend(convasimg);

//                     //     //            console.log("is == undefinded");
//                     // } else {

//                     //     $("#" + id).append(imageshow);
//                     //     $("#imgview" + (count++) + " div").prepend(convasimg);

//                     // }

//                     return dataURL;


//                 }

//                 image.src = readerEvent.target.result;
//                 return dataURL;
//             }
//             reader.readAsDataURL(file);

//             return dataURL;





//         } else {
//             //inputimg.val('');
//             document.getElementById(input_id).value = '';
//             document.getElementById(hidden_input_id).value = '';

//             alert('Please only select images in JPG- or PNG-format.' + file.type);
//             return false;
//         }







//     }






// }


// var imag = new ImgaeUplodedtoServer({ id: "yesss" });
// imag.print();

















// function ajxaproform(e, th, urll) {

//     e.preventDefault();

//     $(":submit").attr('disable', 'disable');

//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     var formData = new FormData(th);



//     $.ajax({
//         method: 'post',
//         url: urll,
//         data: formData,
//         cache: false,
//         contentType: false,
//         processData: false,
//         crossDomain: true,
//         success: function(data) {
//             console.log(data);
//             if (data.statt == 'ok') {

//                 window.location.reload();

//             } else if (data.statt == "error") {

//                 $(".addpro").prepend("<div class='m-4 rounded-lg text-white bg-red-700 '> " + data.message + "</div>");
//                 console.log(data);
//             }
//         },
//         error: (data) => {

//             console.log(data.responseJSON.errors);
//             console.log('error');
//             $(".addpro").prepend("<div class='m-4 rounded-lg text-white bg-red-700 '> " + data.message + "</div>");

//             // if(dA)

//             $(".addpro ").addClass("border-red-800 rounded-lg border ");
//         }

//     });








// }










// function imginput(th, e, maximgsize, imgurl, divid) {


//     if (th.attr('multiple') === undefined) {
//         if (e.target.files.length > 0) {
//             // var divid=th.parent().attr('id');
//             var imgfile = th.attr("id");
//             fileChange(e.target.files[0], divid, imgurl, maximgsize, imgfile);
//         }


//     }


// }




// function fileChange(e, divid, idimgurl, mxsize, imgfile) {
//     var file = e;
//     if (file.type == "image/jpeg" || file.type == "image/png") {
//         var reader = new FileReader();
//         reader.onload = function(readerEvent) {

//             var image = new Image();
//             image.onload = function(imageEvent) {

//                 var max_size = mxsize;

//                 if (image.height < max_size)
//                     max_size = 450;

//                 max_size = Number(max_size);
//                 var w = image.width;
//                 var h = image.height;

//                 if (w > h) {
//                     if (w > max_size) {
//                         h *= max_size / w;
//                         w = max_size;
//                     }
//                 } else {
//                     if (h > max_size) {
//                         w *= max_size / h;
//                         h = max_size;
//                     }
//                 }

//                 var canvas = document.createElement('canvas');
//                 canvas.width = w;
//                 canvas.height = h;
//                 var chim = max_size - h;
//                 var chwi = max_size - w;
//                 var ctx = canvas.getContext('2d');
//                 ctx.drawImage(image, 0, 0, w, h);
//                 ctx.fillStyle = '#fff';
//                 canvas.id = 'red';
//                 var convasimg = document.createElement('canvas');
//                 convasimg.width = max_size + 5;
//                 convasimg.height = max_size + 5;
//                 convasimg.id = 'con' + divid;
//                 var ctximg = convasimg.getContext('2d');
//                 ctximg.fillStyle = '#fff';
//                 ctximg.fillRect(0, 0, max_size + 5, max_size + 5);
//                 ctximg.putImageData(ctx.getImageData(0, 0, max_size, max_size), chwi / 2, chim / 2, 0, 0, w, h);
//                 if (file.type == "image/jpeg" || file.type == "image/JPG") {
//                     var dataURL = convasimg.toDataURL("image/jpeg", 1);
//                 } else {
//                     var dataURL = convasimg.toDataURL("image/png");
//                 }

//                 $("#" + divid + "imgv").html(convasimg);

//                 $("#con" + divid).addClass(' rounded-full h-32 w-32 mx-auto rounded-full image-full');

//                 uploadeimg(dataURL, divid, idimgurl, imgfile)
//                     //  $("#"+idimgurl).val(dataURL);
//                     //                $wire.set('imgurl',dataURL);
//                     // $wire.set("name","ali");



//             }
//             image.src = readerEvent.target.result;
//         }
//         reader.readAsDataURL(file);
//     } else {
//         $("#" + imgfile).val('');
//         alert('Please only select images in JPG- or PNG-format.' + file.type);
//         return false;
//     }
// }










// class ImagetoServer {

//     id;
//     url;
//     src;
//     shep;
//     inputimg;
//     color;


//     constructor(url, id, src = "no", shep = "no", multi = false, w = 0, h = 0, color = "#fff") {
//         this.id = id;
//         this.url = url;
//         this.src = src;
//         this.shep = shep;
//         this.multi = multi;
//         this.w = w;
//         this.h = h;
//         this.color = color
//         this.create();



//     }



//     create() {




//         var idbtn = "'img" + this.id + "'";

//         var ss = ' <div id="div' + this.id + '" class="block rounded-full"> ' +
//             ' <div class="relative pb-6 px-4 mb-4  mx-auto bg-white"> ' +
//             ' <button type="button" onclick="document.getElementById(' + idbtn + ').click()"     class="btn btn-ghost bg-white w-full text-blue-700 rounded-lg  mt-2">اختر                صورة</button>' +
//             ' <input ' +
//             'class="imguploade hidden px-3  rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" ' +
//             ' name="input' + this.id + '" id="img' + this.id + '" type="file"  />  <input value="" id="' + this.id + '" name="' + this.id + '" type="hidden" />' +
//             ' <div class="flex flex-wrap" id="imgrow' + this.id + '"> ' +
//             ' <div class="flex-1 rounded-lg m-2 "> ' +
//             ' <div class="object-center mx-auto text-center  py-4 mb-4 "> ' +
//             ' <img id="imgsrc' + this.id + '"   class=" h-32 w-32 mx-auto rounded-full image-full"/> ' +
//             '</div>   </div> </div> </div> </div> ';

//         //  alert("ksa");

//         //alert(this.id);
//         //a/lert($("#"+this.id).attr("name"));

//         $("#" + this.id).html(ss);
//         $("#" + this.id).attr("id", "maindiv" + this.id);

//         if (this.src !== "no") {
//             $("#imgsrc" + this.id).attr("src", this.src);
//             $("#" + this.id).attr("value", this.src);
//             //  document.getElementById(this.id).value=this.id;

//             if (this.shep == "rect")
//                 $("#imgsrc" + this.id).removeClass("rounded-full h-32 w-32 mx-auto rounded-full image-full");
//         }



//         this.inputimg = $("#img" + this.id);
//         if (this.multi) {
//             this.inputimg.attr("multiple", "multiple");
//         }
//         var id_d = "imgrow" + this.id;
//         var input_id = this.id;
//         var url = this.url;
//         var h = this.h;
//         var w = this.w;
//         var lcolor = this.color;
//         this.inputimg.change(function(e) {

//             // alert(this.value);
//             //var dataUrl = ;
//             //hello();

//             for (var i = 0; i < e.target.files.length; i++) {

//                 if (w === 0 && h === w)
//                     convert_tobase_with_orginal_wh(e.target.files[i], lcolor, this, id_d, url, input_id);
//                 else
//                     convert_tobase(e.target.files[i], lcolor, this, id_d, url, input_id, w);


//                 //   count++;
//             }

//             if (e.target.files.length > 1) {

//                 $("#" + id_d).append("<button type='button'  class='w-full block btn' id='uploadall'>تاكيد الكل</button>");

//                 console.log("is more then one");
//                 $("#uploadall").click(function() {
//                     $(".uploadebtn").click();

//                     $(this).attr("disabled", "disabled");

//                 });

//             }

//             this.value = "";

//         });

//         //alert($("#"+this.id).parent().html());




//     }





// };


// function upLoad(data, url, id_input, th, inputname) {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });


//     var loadbtn = '<div id="lodbtn' + th.id + '" class="text-center  "> <span class="btn text-xl loading mx-auto my-auto bg-white text-blue-500 p-1 btn-circle "></span> </div>';
//     var errorbtn = '<div id="errorbtn' + th.id + '" class=" text-cente "> <button type="button" class="btn  mx-auto my-auto text-red-800   btn-circle  bg-white btn-ghost">اعادة المحاولة</button> </div>';
//     //th.parent().append(loadbtn);
//     th.slideUp(400).parent().append(loadbtn);
//     th.attr("disabled", "disabled");



//     $.ajax({
//         url: url,
//         method: "POST",
//         data: { 'data64': data },
//         dataType: 'JSON',

//         success: function(data) {

//             if (data.error == "no") {


//                 var ismultiple = $("#" + id_input).attr('multiple') !== undefined;


//                 if (ismultiple)
//                     $("#" + id_input).parent().append("<input type='hidden'  value='" + data.url + "' name='" + inputname + "[]' /> ");
//                 else
//                     $("#" + inputname).val(data.url);

//                 $("#lodbtn" + th.id).slideUp(300).remove();
//                 th.remove();


//             } else {
//                 $("#lodbtn" + th.id).slideUp(300).remove();
//                 th.parent().append(errorbtn);

//                 $("#errorbtn" + th.id + " button").on('click', function() {
//                     upLoad(data.data64, url, id_input, th);
//                     $(this).slideUp(400).remove();
//                 });

//             }

//         },
//         error: function(data) {

//             //th.html(errorbtn);
//             $("#lodbtn" + th.id).slideUp(300).remove();
//             th.parent().append(errorbtn);

//             $("#errorbtn" + th.id + " button").on('click', function() {
//                 upLoad(data.data64, url, id_input, th);
//                 $(this).slideUp(400).remove();
//             });
//             console.log(data);

//         },
//         beforeSend: function() {},

//     });





// }
// let count = 0;






// function convert_tobase_with_orginal_wh(e, color, inputimg, id, urll, inputname) {


//     var file = e;

//     if (file.type == "image/jpeg" || file.type == "image/png" || file.type == "image/jpg" || file.type == "image/JPG") {
//         var reader = new FileReader();
//         var dataURL;
//         reader.onload = function(readerEvent) {

//             var image = new Image();
//             image.onload = function(imageEvent) {

//                 var w = image.width;
//                 var h = image.height;
//                 console.log(w);
//                 console.log(h);
//                 console.log(h * w);




//                 if ((w * h) > 10000000) {
//                     w = w / 6;
//                     h = h / 6;
//                 }
//                 if ((w * h) > 1000000) {
//                     w = w / 4;
//                     h = h / 4;
//                 }
//                 console.log(w * h);


//                 var canvas = document.createElement('canvas');
//                 canvas.width = w;
//                 canvas.height = h;
//                 var chim = h;
//                 var chwi = w;
//                 var ctx = canvas.getContext('2d');
//                 ctx.drawImage(image, 0, 0, w, h);
//                 ctx.fillStyle = color;

//                 var convasimg = document.createElement('canvas');
//                 convasimg.width = w;
//                 convasimg.height = h;
//                 //convasimg.id = 'con' + divid;
//                 var ctximg = convasimg.getContext('2d');
//                 ctximg.fillStyle = color;
//                 ctximg.fillRect(0, 0, w, h);
//                 ctximg.putImageData(ctx.getImageData(0, 0, w, h), 0, 0, 0, 0, w, h);

//                 if (file.type == "image/jpeg" || file.type == "image/JPG") {
//                     dataURL = convasimg.toDataURL("image/jpeg", 1);
//                     //    console.log(dataURL);
//                 } else {
//                     dataURL = convasimg.toDataURL("image/png");
//                     //  console.log(dataURL);
//                 }
//                 //                console.log(dataURL);


//                 // $("#"+divid+"imgv").html(convasimg);

//                 var dataUrl = '"' + dataURL + '"';
//                 var url = '"' + urll + '"';
//                 var input_id = '"' + inputimg.id + '"';
//                 var inputnamee = '"' + inputname + '"';

//                 // <div class="">
//                 var imageshow = "<div id='imgview" + count + "' class='flex-1 rounded-lg border-blue-600 border m-2 '><div class='object-center mx-auto text-center ' ><button class='btn uploadebtn btn-ghost btn-sm' onclick='upLoad(" + dataUrl + "," + url + "," + input_id + ",$(this)," + inputnamee + ")'> تاكيد</button> </div></div>";
//                 //                var im = "";


//                 // $("#" + id).parent().parent()

//                 console.log(inputimg.id);
//                 if ($("#" + inputimg.id).attr('multiple') === undefined) {
//                     //              $("#" + id).parent().html(convasimg).append(im);
//                     $("#" + id).html(imageshow);
//                     $("#imgview" + count++).prepend(convasimg);

//                     //            console.log("is == undefinded");
//                 } else {

//                     $("#" + id).append(imageshow);
//                     $("#imgview" + (count++) + " div").prepend(convasimg);

//                 }
//                 // $("#" + id).parent().append(im);


//                 // $("#con"+divid).addClass(' rounded-full h-32 w-32 mx-auto rounded-full image-full');

//                 //   uploadeimg(dataURL,divid,idimgurl,imgfile)
//                 //  $("#"+idimgurl).val(dataURL);
//                 //                $wire.set('imgurl',dataURL);
//                 // $wire.set("name","ali");



//             }
//             image.src = readerEvent.target.result;
//         }

//         //   return dataURL;

//         reader.readAsDataURL(file);

//         return 0;
//     } else {
//         //   inputimg.val('');
//         alert('Please only select images in JPG- or PNG-format.' + file.type);
//         return false;
//     }

// }











// function convert_tobase(e, color, inputimg, id, urll, inputname, maxsize) {



//     var file = e;
//     // alert(id);
//     if (file.type == "image/jpeg" || file.type == "image/png" || file.type == "image/jpg" || file.type == "image/JPG") {
//         var reader = new FileReader();
//         reader.onload = function(readerEvent) {

//             var image = new Image();
//             image.onload = function(imageEvent) {
//                 //if (image.height < max_size)
//                 var max_size = maxsize;

//                 if (image.height < max_size)
//                     max_size = 450;



//                 //   ma


//                 max_size = Number(max_size);
//                 var w = image.width;
//                 var h = image.height;

//                 if (w > h) {
//                     if (w > max_size) {
//                         h *= max_size / w;
//                         w = max_size;
//                     }
//                 } else {
//                     if (h > max_size) {
//                         w *= max_size / h;
//                         h = max_size;
//                     }
//                 }

//                 var canvas = document.createElement('canvas');
//                 canvas.width = w;
//                 canvas.height = h;
//                 var chim = max_size - h;
//                 var chwi = max_size - w;
//                 var ctx = canvas.getContext('2d');
//                 ctx.drawImage(image, 0, 0, w, h);
//                 ctx.fillStyle = color;
//                 canvas.id = 'red';
//                 var convasimg = document.createElement('canvas');
//                 convasimg.width = max_size + 5;
//                 convasimg.height = max_size + 5;
//                 // convasimg.id = 'con' + divid;
//                 var ctximg = convasimg.getContext('2d');
//                 ctximg.fillStyle = color;
//                 ctximg.fillRect(0, 0, max_size + 5, max_size + 5);
//                 ctximg.putImageData(ctx.getImageData(0, 0, max_size, max_size), chwi / 2, chim / 2, 0, 0, w, h);
//                 if (file.type == "image/jpeg" || file.type == "image/JPG") {
//                     var dataURL = convasimg.toDataURL("image/jpeg", 1);
//                 } else {
//                     var dataURL = convasimg.toDataURL("image/png");
//                 }



//                 // max_size = maxsize;

//                 // max_size = Number(max_size);
//                 // var w = image.width;
//                 // var h = image.height;


//                 // if (w > h) {
//                 //     if (w > max_size) {
//                 //         h *= max_size / w;
//                 //         w = max_size;
//                 //     }
//                 // } else {
//                 //     if (h > max_size) {
//                 //         w *= max_size / h;
//                 //         h = max_size;
//                 //     }
//                 // }

//                 // var canvas = document.createElement('canvas');
//                 // canvas.width = w;
//                 // canvas.height = h;
//                 // var chim = max_size - h;
//                 // var chwi = max_size - w;
//                 // var ctx = canvas.getContext('2d');
//                 // ctx.drawImage(image, 0, 0, w, h);
//                 // ctx.fillStyle = color;

//                 // var convasimg = document.createElement('canvas');
//                 // convasimg.width = max_size + 5;
//                 // convasimg.height = max_size + 5;
//                 // //convasimg.id = 'con' + divid;
//                 // var ctximg = convasimg.getContext('2d');
//                 // ctximg.fillStyle = color;
//                 // ctximg.fillRect(0, 0, max_size + 5, max_size + 5);
//                 // ctximg.putImageData(ctx.getImageData(0, 0, max_size, max_size), chwi / 2, chim / 2, 0, 0, w, h);

//                 // if (file.type == "image/jpeg" || file.type == "image/JPG") {
//                 //     var dataURL = convasimg.toDataURL("image/jpeg", 1);
//                 // } else {
//                 //     var dataURL = convasimg.toDataURL("image/png");
//                 // }



//                 var dataUrl = '"' + dataURL + '"';
//                 var url = '"' + urll + '"';
//                 var input_id = '"' + inputimg.id + '"';
//                 var inputnamee = '"' + inputname + '"';

//                 // <div class="">
//                 var imageshow = "<div id='imgview" + count + "' class='flex-1 rounded-lg border-blue-600 border m-2 '><div class='object-center mx-auto text-center ' ><button class='btn uploadebtn btn-ghost btn-sm' onclick='upLoad(" + dataUrl + "," + url + "," + input_id + ",$(this)," + inputnamee + ")'> تاكيد</button> </div></div>";
//                 //                var im = "";


//                 // $("#" + id).parent().parent()

//                 console.log(inputimg.id);
//                 if ($("#" + inputimg.id).attr('multiple') === undefined) {
//                     //              $("#" + id).parent().html(convasimg).append(im);
//                     $("#" + id).html(imageshow);
//                     $("#imgview" + count++).prepend(convasimg);

//                     //            console.log("is == undefinded");
//                 } else {

//                     $("#" + id).append(imageshow);
//                     $("#imgview" + (count++) + " div").prepend(convasimg);

//                 }


//             }
//             image.src = readerEvent.target.result;
//         }
//         reader.readAsDataURL(file);
//         return 0;
//     } else {
//         inputimg.val('');
//         alert('Please only select images in JPG- or PNG-format.' + file.type);
//         return false;
//     }



// }
















// function uploadeimg(dataURL, divid, idimgurl, imgfile) {


//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });



//     var urll = "/admin/uploade";

//     var loadbtn = '<div id="lodbtn' + divid + '" class="absolute text-center bottom-0 z-30  "> <button type="button" class="btn loading mx-auto my-auto text-blue-500 bg-white p-4 btn-circle mx-auto  btn-ghost"></button> </div>';
//     var errorbtn = '<div id="errorbtn' + divid + '" class="absolute text-center bottom-0 z-30  "> <button type="button" class="btn  mx-auto my-auto text-red-800   btn-circle  bg-white btn-ghost">retry</button> </div>';
//     //  var errorbtn='<div id="errbtn'+divid+'" class="absolute text-center bottom-0 z-30  "> <button class="btn  mx-auto my-auto text-red-800   btn-circle  bg-white btn-ghost">retry</button> </div>';

//     $.ajax({
//         url: urll,
//         method: 'POST',
//         data: { 'data64': dataURL },
//         dataType: 'JSON',

//         beforeSend: () => {

//             $("#" + divid).append(loadbtn);

//         },
//         error: function(data) {

//             $("#" + divid).append(errorbtn);
//             $("#lodbtn" + divid).remove();
//             $("#errorbtn" + divid + " button").on('click', function() {
//                 uploadeimg(data.data64, divid, idimgurl);
//             });
//             console.log(data);
//         },
//         crossDomain: false,
//         success: function(data) {

//             console.log(data);

//             if (data.error == 'no') {




//                 if ($("#" + imgfile).attr('multiple') === undefined && $("#" + idimgurl).val() !== "") {

//                     deleteimg($("#" + idimgurl).val(), '/product.deleteimg');
//                     $('#' + idimgurl).val(data.url);

//                 } else if ($("#" + idimgurl).val() === "" || $("#" + idimgurl).val() === undefined) {
//                     $('#' + idimgurl).val(data.url);
//                     // $wire.set('imgurl',"'"+data.url+"'");
//                     //$wire.__instance;
//                     $("#lodbtn" + divid).hide(200);
//                     $("#lodbtn" + divid).remove();

//                     $("#" + divid).addClass("bg-blue-600");
//                 } else {
//                     if ($('#' + idimgurl).val() == undefined || $('#' + idimgurl).val() == "")
//                         $('#' + idimgurl).val(data.url);
//                     else
//                         $('#' + idimgurl).val(data.url + "|" + $('#' + idimgurl).val());
//                 }


//                 $("#lodbtn" + divid).hide(200);
//                 $("#lodbtn" + divid).remove();

//                 $("#" + divid).addClass("bg-blue-600");
//             } else {
//                 $("#" + divid).append(errorbtn);
//                 $("#lodbtn" + divid).remove();
//                 $("#errorbtn" + divid + " button").on('click', function() {
//                     uploadeimg(dataURL, divid, idimgurl);
//                 });


//             }
//         },


//     });










// }







// function deleteimg(imgurl, url) {



//     $.ajax({
//         method: 'get',
//         url: url,
//         data: { 'imgurl': imgurl },
//         dataType: 'JSON',
//         success: (data) => {

//             alert('successful');
//             console.log(data);

//         },
//         error: (data) => {
//             console.log(data);
//         },


//     });


// }








// function imgsuploades(e) {

//     var imgsrow = $("#rowsofimgs");

//     alert(ic);
//     for (var i = 0; i < e.target.files.length; i++) {

//         var ic = $("#ic").val();

//         imgsrow.append(' <div id="imgview' + ic + '" class="flex-1 rounded-lg m-2 ">\n' +
//             '                                <div id="imgview' + ic + 'imgv" class="object-center mx-auto text-center  py-4 mb-4 " > \n' + ic +
//             '                                </div>\n' +
//             '                            </div>');

//         fileChange(e.target.files[i], "imgview" + ic, 'imgsurl', 600, "imgsuploade");


//         ic++;
//         var ic = $("#ic").val(ic);

//         //alert(ic);




//     }






// }


function printContent(id, csspath = "../css/app.css") {
    str = document.getElementById(id).innerHTML
    newwin = window.open("", "printwin", 'left=100,top=100,width=800,height=800')
    newwin.document.write('<HTML>\n<HEAD>\n')
    newwin.document.write('<TITLE>Print Page</TITLE>\n')
    newwin.document.write('    <link rel="stylesheet" href="' + csspath + '">  \n')
    newwin.document.write('    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">')
    newwin.document.write('<script>\n')
    newwin.document.write('function chkstate(){\n')
    newwin.document.write('if(document.readyState=="complete"){\n')
    newwin.document.write('window.close()\n')
    newwin.document.write('}\n')
    newwin.document.write('else{\n')
    newwin.document.write('setTimeout("chkstate()",5000)\n')
    newwin.document.write('}\n')
    newwin.document.write('}\n')
    newwin.document.write('function print_win(){\n')
    newwin.document.write('window.print();\n')
    newwin.document.write('chkstate();\n')
    newwin.document.write('}\n')
    newwin.document.write('<\/script>\n')
    newwin.document.write('</HEAD>\n')
    newwin.document.write('<BODY dir="rtl" onload="print_win()">\n')
    newwin.document.write(str)
    newwin.document.write('</BODY>\n')
    newwin.document.write('</HTML>\n')
    newwin.document.close()
}


// class ImgaeUplodedtoServer {

//     constructor({ url, id, w = 650, h = 650, shep = "rect", color = "#fff", mulit = false, lablename = "", iconolnly = false, icon = "", oldsrc = "" }) {
//         this.url = url;
//         this.id = id;
//         this.w = w;
//         this.h = h;
//         this.shep = shep;
//         this.color = color;
//         this.mulit = mulit;
//         this.lablename = lablename;
//         this.iconolnly = iconolnly;
//         this.icon = icon;
//         this.oldsrc = oldsrc;

//     }

//     print(x) {
//         console.log("from print = " + x)
//     }

//     create() {
//         var inputid = "'input" + this.id + "'";

//         var source = ' <div  class=" rounded-full"> ' +
//             ' <div class="relative pb-6 px-4 mb-4  mx-auto bg-white"> ' +
//             ' <button type="button" onclick="document.getElementById(' + inputid + ').click()"     class="btn btn-ghost bg-white  text-blue-700 rounded-lg  mt-2">' + this.lablename + '</button>' +
//             ' <input ' +
//             'class="imguploade hidden px-3  rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" ' +
//             ' name="input' + this.id + '" id="input' + this.id + '" type="file"  />  <input value="" id="value' + this.id + '" name="value' + this.id + '" type="hidden" />' +
//             ' <div class="flex flex-wrap" id="imgrow' + this.id + '"> ' +
//             ' <div class="flex-1 rounded-lg m-2 "> ' +
//             ' <div class="object-center mx-auto text-center  py-4 mb-4 "> ' +
//             ' <img id="imgsrc' + this.id + '" src="' + this.oldsrc + '"  class=" h-32 w-32 mx-auto rounded-full image-full"/> ' +
//             '</div>   </div> </div> </div> </div> ';
//         document.getElementById(this.id).innerHTML = source;
//         document.getElementById("input" + this.id).addEventListener('change', (e) => {
//             //console.log("length =  " + e.target.files.length + "     id aand src = " + this.oldsrc + " " + this.shep);
//             //this.print(e.target.files.length)

//             var data = this.convert_to_base64(e.target.files[0]);
//             var d = document.getElementById("value" + this.id).value;
//             console.log("the d ");
//             console.log(d);
//         });
//     }

//     convert_to_base64(e) {

//         var file = e;
//         var dataURL;
//         var height = this.h;
//         var width = this.w;
//         var color = this.color;
//         var input_id = this.id;
//         var mulit = this.mulit;
//         var url = this.url;

//         if (file.type == "image/jpeg" || file.type == "image/png" || file.type == "image/jpg" || file.type == "image/JPG") {
//             var reader = new FileReader();
//             reader.onload = function(readerEvent) {

//                 var image = new Image();
//                 image.onload = function(imageEvent) {
//                     //if (image.height < max_size)
//                     var max_size = height;

//                     if (image.height < max_size)
//                         max_size = 650;



//                     //   ma


//                     max_size = Number(max_size);
//                     var w = image.width;
//                     var h = image.height;

//                     if (w > h) {
//                         if (w > max_size) {
//                             h *= max_size / w;
//                             w = max_size;
//                         }
//                     } else {
//                         if (h > max_size) {
//                             w *= max_size / h;
//                             h = max_size;
//                         }
//                     }

//                     var canvas = document.createElement('canvas');
//                     canvas.width = w;
//                     canvas.height = h;
//                     var chim = max_size - h;
//                     var chwi = max_size - w;
//                     var ctx = canvas.getContext('2d');
//                     ctx.drawImage(image, 0, 0, w, h);
//                     ctx.fillStyle = color;
//                     canvas.id = 'red';
//                     var convasimg = document.createElement('canvas');
//                     convasimg.width = max_size + 5;
//                     convasimg.height = max_size + 5;
//                     // convasimg.id = 'con' + divid;
//                     var ctximg = convasimg.getContext('2d');
//                     ctximg.fillStyle = color;
//                     ctximg.fillRect(0, 0, max_size + 5, max_size + 5);
//                     ctximg.putImageData(ctx.getImageData(0, 0, max_size, max_size), chwi / 2, chim / 2, 0, 0, w, h);




//                     if (file.type == "image/jpeg" || file.type == "image/JPG") {
//                         dataURL = convasimg.toDataURL("image/jpeg", 1);
//                     } else {
//                         dataURL = convasimg.toDataURL("image/png");
//                     }



//                     var dataUrl = '"' + dataURL + '"';
//                     console.log(dataURL);
//                     document.getElementById("value" + input_id).value = dataURL;

//                     var imagView = ' <div class="flex-1 rounded-lg m-2 "> ' +
//                         ' <div class="object-center mx-auto text-center  py-4 mb-4 "> ' +
//                         '<div class=" h-32 w-32 mx-auto rounded-full image-full"></div> ' +
//                         '</div>   </div>';

//                     var rowelemnt = document.getElementById('imgrow' + input_id);
//                     console.log(rowelemnt.innerHTML);
//                     convasimg.classList.add('w-32');
//                     convasimg.classList.add('flex');

//                     console.log(rowelemnt.lastElementChild.innerHTML)
//                     if (mulit == false)
//                         rowelemnt.lastElementChild.lastElementChild.innerHTML = '';

//                     var but = "<button class='btn uploadebtn btn-ghost btn-sm' onclick='upLoad(" + dataURL + "," + url + "," + input_id + ",$(this)," + "value" + input_id + ")'> تاكيد</button>";
//                     rowelemnt.lastElementChild.lastElementChild.appendChild(convasimg);
//                     $("#imgrow").lastElementChild.appendChild(but);




//                     //var url = '"' + urll + '"';
//                     //var input_id = '"' + inputimg.id + '"';
//                     //var inputnamee = '"' + inputname + '"';

//                     // <div class="">
//                     //var imageshow = "<div id='imgview" + count + "' class='flex-1 rounded-lg border-blue-600 border m-2 '><div class='object-center mx-auto text-center ' ><button class='btn uploadebtn btn-ghost btn-sm' onclick='upLoad(" + dataUrl + "," + url + "," + input_id + ",$(this)," + inputnamee + ")'> تاكيد</button> </div></div>";
//                     //                var im = "";


//                     // $("#" + id).parent().parent()

//                     // console.log(inputimg.id);
//                     // if ($("#" + inputimg.id).attr('multiple') === undefined) {
//                     //     //              $("#" + id).parent().html(convasimg).append(im);
//                     //     $("#" + id).html(imageshow);
//                     //     $("#imgview" + count++).prepend(convasimg);

//                     //     //            console.log("is == undefinded");
//                     // } else {

//                     //     $("#" + id).append(imageshow);
//                     //     $("#imgview" + (count++) + " div").prepend(convasimg);

//                     // }

//                     return dataURL;


//                 }

//                 image.src = readerEvent.target.result;
//                 return dataURL;
//             }
//             reader.readAsDataURL(file);

//             return dataURL;





//         } else {
//             //inputimg.val('');
//             document.getElementById(input_id).value = '';
//             document.getElementById(hidden_input_id).value = '';

//             alert('Please only select images in JPG- or PNG-format.' + file.type);
//             return false;
//         }







//     }






// }



















function ajxaproform(e, th, urll) {

    e.preventDefault();

    $(":submit").attr('disable', 'disable');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = new FormData(th);



    $.ajax({
        method: 'post',
        url: urll,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        crossDomain: true,
        success: function(data) {
            console.log(data);
            if (data.statt == 'ok') {

                window.location.reload();

            } else if (data.statt == "error") {

                $(".addpro").prepend("<div class='m-4 rounded-lg text-white bg-red-700 '> " + data.message + "</div>");
                console.log(data);
            }
        },
        error: (data) => {

            console.log(data.responseJSON.errors);
            console.log('error');
            $(".addpro").prepend("<div class='m-4 rounded-lg text-white bg-red-700 '> " + data.message + "</div>");

            // if(dA)

            $(".addpro ").addClass("border-red-800 rounded-lg border ");
        }

    });








}










function imginput(th, e, maximgsize, imgurl, divid) {


    if (th.attr('multiple') === undefined) {
        if (e.target.files.length > 0) {
            // var divid=th.parent().attr('id');
            var imgfile = th.attr("id");
            fileChange(e.target.files[0], divid, imgurl, maximgsize, imgfile);
        }


    }


}




function fileChange(e, divid, idimgurl, mxsize, imgfile) {
    var file = e;
    if (file.type == "image/jpeg" || file.type == "image/png") {
        var reader = new FileReader();
        reader.onload = function(readerEvent) {

            var image = new Image();
            image.onload = function(imageEvent) {

                var max_size = mxsize;

                if (image.height < max_size)
                    max_size = 450;

                max_size = Number(max_size);
                var w = image.width;
                var h = image.height;

                if (w > h) {
                    if (w > max_size) {
                        h *= max_size / w;
                        w = max_size;
                    }
                } else {
                    if (h > max_size) {
                        w *= max_size / h;
                        h = max_size;
                    }
                }

                var canvas = document.createElement('canvas');
                canvas.width = w;
                canvas.height = h;
                var chim = max_size - h;
                var chwi = max_size - w;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(image, 0, 0, w, h);
                ctx.fillStyle = '#fff';
                canvas.id = 'red';
                var convasimg = document.createElement('canvas');
                convasimg.width = max_size + 5;
                convasimg.height = max_size + 5;
                convasimg.id = 'con' + divid;
                var ctximg = convasimg.getContext('2d');
                ctximg.fillStyle = '#fff';
                ctximg.fillRect(0, 0, max_size + 5, max_size + 5);
                ctximg.putImageData(ctx.getImageData(0, 0, max_size, max_size), chwi / 2, chim / 2, 0, 0, w, h);
                if (file.type == "image/jpeg" || file.type == "image/JPG") {
                    var dataURL = convasimg.toDataURL("image/jpeg", 1);
                } else {
                    var dataURL = convasimg.toDataURL("image/png");
                }

                $("#" + divid + "imgv").html(convasimg);

                $("#con" + divid).addClass(' rounded-full h-32 w-32 mx-auto rounded-full image-full');

                uploadeimg(dataURL, divid, idimgurl, imgfile)
                    //  $("#"+idimgurl).val(dataURL);
                    //                $wire.set('imgurl',dataURL);
                    // $wire.set("name","ali");



            }
            image.src = readerEvent.target.result;
        }
        reader.readAsDataURL(file);
    } else {
        $("#" + imgfile).val('');
        alert('Please only select images in JPG- or PNG-format.' + file.type);
        return false;
    }
}










class ImagetoServer {

    id;
    url;
    src;
    shep;
    inputimg;
    color;
    with_w_h;
    mx_h;
    mx_w;
    hv;
    withmask;
    maskUrl;


    constructor({
        url,
        id,
        src = "no",
        shep = "no",
        multi = false,
        mx_h = -1,
        mx_w = -1,
        w = 0,
        h = 0,
        color = "#fff",
        with_w_h = false,
        hv = 400,
        withmask = false,
        maskUrl = ''
    }) {
        this.id = id;
        this.hv = hv;
        this.maskUrl = maskUrl;
        this.withmask = withmask;
        this.url = url;
        this.src = src;
        this.shep = shep;
        this.multi = multi;
        this.w = w;
        this.h = h;
        this.color = color;
        this.with_w_h = with_w_h;
        this.mx_h = mx_h;
        this.mx_w = mx_w;
        this.create();



    }



    create() {




        var idbtn = "'img" + this.id + "'";

        var class_row = "grid lg:grid-cols-3 sm:grid-cols-2";

        if (!this.multi)
            class_row = "flex";

        var ss = ' <div id="div' + this.id + '" class="block rounded-full"> ' +
            ' <div class="relative pb-6 px-4 mb-4  mx-auto bg-white border rounded-md dark:bg-dark"> ' +
            ' <button type="button" onclick="document.getElementById(' + idbtn + ').click()"     class="btn btn-ghost bg-white w-full text-blue-700 rounded-lg  mt-2">اختر                صورة</button>' +
            ' <input ' +
            'class="imguploade hidden " ' +
            ' name="input' + this.id + '" id="img' + this.id + '" type="file"  />  <input value="" id="' + this.id + '"  name="' + this.id + '" type="hidden" />' +
            ' <div class="' + class_row + '" id="imgrow' + this.id + '"> ' +
            ' <div class=" rounded-lg m-2 mx-auto"> ' +
            ' <div class="object-center mx-auto text-center  py-4 mb-4 "> ' +
            ' <img id="imgsrc' + this.id + '"   class="mx-auto  rounded-full border image-full"/> ' +
            '</div>   </div> </div> </div> </div> ';

        //  alert("ksa");

        //alert(this.id);
        //a/lert($("#"+this.id).attr("name"));

        $("#" + this.id).html(ss);
        $("#" + this.id).attr("id", "maindiv" + this.id);

        if (this.src !== "no" && !this.multi) {
            $("#imgsrc" + this.id).attr("src", this.src);


            if (this.mx_h != -1)
                $("#imgsrc" + this.id).attr("height", this.mx_h);
            else
                $("#imgsrc" + this.id).attr("height", this.hv);

            $("#" + this.id).attr("value", this.src);
            //  document.getElementById(this.id).value=this.id;


            if (this.shep == "rect")
                $("#imgsrc" + this.id).removeClass("rounded-full  mx-auto rounded-full image-full");
        } else {
            $("#imgsrc" + this.id).remove();
        }



        this.inputimg = $("#img" + this.id);
        if (this.multi) {
            this.inputimg.attr("multiple", "multiple");

            if (this.src !== "no") {
                var imgs = JSON.parse(this.src);
                $('#imgrow' + this.id + " div").remove();
                for (var m in imgs) {
                    console.log(imgs[m]);
                    var imgsvie = ' <div  class=" relative border border-info  rounded-lg m-2 "> ' +
                        '<span onclick="$(this).parent().hide(200).remove()" class="absolute top-0 right-0 bg-white rounded-full p-2 text-danger cursor-pointer font-bold">X</span>' +
                        ' <div class="object-center mx-auto text-center mt-8 "> ' +
                        ' <img id="imgsrc' + this.id + '"  src="' + imgs[m] + '"  class=" h-32 w-32 mx-auto border border-info rounded-md image-full"/> ' +
                        '</div> <input type="hidden" id="' + imgs[m] + '" name="' + this.id + '[]"  value="' + imgs[m] + '" />  </div> ';
                    var inputh =
                        $('#imgrow' + this.id).append(imgsvie);



                }



            }






        }
        var id_d = "imgrow" + this.id;
        var input_id = this.id;
        var url = this.url;
        var h = this.h;
        var w = this.w;
        var mx_h = this.mx_h;
        var mx_w = this.mx_w;
        var with_w_h = this.with_w_h
        var lcolor = this.color;
        var withmask = this.withmask;
        var maskUrl = this.maskUrl;
        this.inputimg.change(function(e) {

            // alert(this.value);
            //var dataUrl = ;
            //hello();

            for (var i = 0; i < e.target.files.length; i++) {


                if (mx_h != -1 && mx_w != -1) {
                    console.log("Max Hight " + mx_h + " Max Width  " + mx_w);
                    convert_tobase(e.target.files[i], lcolor, this, id_d, url, input_id, w, mx_h, mx_w, withmask, maskUrl);

                } else if ((w === 0 && h === w) || with_w_h == true) {
                    console.log("with wh");

                    convert_to_base64_orginal_w(e.target.files[i], lcolor, this, id_d, url, input_id, w, h, withmask, maskUrl);

                } else
                    convert_tobase(e.target.files[i], lcolor, this, id_d, url, input_id, w);


                //   count++;
            }

            if (e.target.files.length > 1) {

                $("#" + id_d).parent().append("<button type='button'  class='w-full block btn' id='uploadall'>تاكيد الكل</button>");

                console.log("is more then one");
                $("#uploadall").click(function() {
                    $(".uploadebtn").click();

                    $(this).attr("disabled", "disabled");

                });

            }

            this.value = "";

        });

        //alert($("#"+this.id).parent().html());




    }





};


function upLoad(data, url, id_input, th, inputname) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    var loadicon = $("#loadicon").html();

    var loadbtn = '<div id="lodbtn' + th.id + '" class="text-center  "> <span  id="lodbtn' + th.id + 'icon"  class="btn text-xl loading mx-auto my-auto bg-white text-blue-500 p-1 btn-circle "></span> </div>';
    var errorbtn = '<div id="errorbtn' + th.id + '" class=" text-cente "> <button type="button" class=" mx-auto my-auto  border-danger-darker border-2 text-danger  m-4 p-2 rounded-xl">اعادة المحاولة</button> </div>';
    //th.parent().append(loadbtn);
    th.slideUp(400).parent().append(loadbtn);

    $("#lodbtn" + th.id + "icon").append(loadicon);
    th.attr("disabled", "disabled");



    $.ajax({
        url: url,
        method: "POST",
        data: { 'data64': data },
        dataType: 'JSON',

        success: function(data) {

            if (data.error == "no") {


                var ismultiple = $("#" + id_input).attr('multiple') !== undefined;


                if (ismultiple)
                    $("#" + id_input).parent().append("<input type='hidden'  value='" + data.url + "' name='" + inputname + "[]' /> ");
                else {
                    $("#" + inputname).val(data.url);

                    if ($("#" + inputname + "wire") != undefined) {
                        $("#" + inputname + "wire").val(data.url);
                        console.log("is not undefinded");
                    }
                }

                $("#lodbtn" + th.id).slideUp(300).remove();
                th.remove();


            } else {
                $("#lodbtn" + th.id).slideUp(300).remove();
                th.parent().append(errorbtn);


                $("#errorbtn" + th.id + " button").on('click', function() {
                    upLoad(data.data64, url, id_input, th);
                    $(this).slideUp(400).remove();
                });

            }

        },
        error: function(data) {

            //th.html(errorbtn);
            $("#lodbtn" + th.id).slideUp(300).remove();
            th.parent().append(errorbtn);

            $("#errorbtn" + th.id + " button").on('click', function() {
                upLoad(data.data64, url, id_input, th);
                $(this).slideUp(400).remove();
            });
            console.log(data);

        },
        beforeSend: function() {},

    });





}
let count = 0;





function convert_to_base64_orginal_w(e, color, inputimg, id, urll, inputname, w, h, withmask, maskurl) {


    var file = e;

    if (file.type == "image/jpeg" || file.type == "image/png" || file.type == "image/webp" || file.type == "image/svg+xml" || file.type == "image/svg" || file.type == "image/jpg" || file.type == "image/JPG") {
        var reader = new FileReader();
        var dataURL;
        reader.onload = function(readerEvent) {

            var image = new Image();
            image.onload = function(imageEvent) {

                var ww = image.width;
                // w = image.width;
                var hh = image.height;

                console.log("hh=" + hh + "  ww=" + ww);
                if (ww > w || hh > h) {

                    console.log("yesss  hh=" + hh + "  ww=" + ww);
                    while (ww > w && hh > h) {
                        ww--;
                        hh--;
                    }
                    if (ww > 2 * hh) {
                        while (ww > w * 2) {
                            ww--;
                        }
                    }
                }
                h = hh;
                w = ww;

                // if (ww > hh) {
                //     var fark = ww - hh;

                //     if (ww > w) {

                //         ww -= hh;

                //         if (ww > 2 * h)
                //             ww -= hh / 2;


                //         w = ww;
                //     }

                //     //    w = ww;
                // }


                // if (ww < hh) {
                //     var fark = ww - hh;

                //     if (hh > h) {

                //         hh -= ww;

                //         if (hh > 2 * w)
                //             hh -= ww / 2;


                //         h = hh;
                //     }

                //     //    w = ww;
                // }
                // var h = image.height;
                console.log(w);
                console.log(h);
                console.log(h * w);




                if ((w * h) > 10000000) {
                    w = w / 6;
                    h = h / 6;
                }
                if ((w * h) > 1000000) {
                    w = w / 4;
                    h = h / 4;
                }
                console.log(w * h);


                var canvas = document.createElement('canvas');
                canvas.width = w;
                canvas.height = h;
                var chim = h;
                var chwi = w;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(image, 0, 0, w, h);
                ctx.fillStyle = color;

                var convasimg = document.createElement('canvas');
                convasimg.width = w;
                convasimg.height = h;
                // convasimg.id = 'con' + divid;
                var ctximg = convasimg.getContext('2d');
                ctximg.fillStyle = color;
                ctximg.fillRect(0, 0, w, h);
                ctximg.putImageData(ctx.getImageData(0, 0, w, h), 0, 0, 0, 0, w, h);






                // if (file.type == "image/jpeg" || file.type == "image/JPG") {
                //     dataURL = convasimg.toDataURL("image/jpeg", 1);
                //     //    console.log(dataURL);
                // } else {
                //     dataURL = convasimg.toDataURL("image/png");
                //     //  console.log(dataURL);
                // }
                // //                console.log(dataURL);


                // $("#"+divid+"imgv").html(convasimg);
                convasimg.classList.add('h-64');

                if (withmask == true) {
                    var imgLogo = new Image();
                    var dataURL;
                    imgLogo.onload = function(imageEvent) {
                        //   convasimg.dr
                        ctximg.drawImage(imgLogo, w - imgLogo.width - 40, h - imgLogo.height - 40);
                        // ctximg.putImageData(ctxlogo.getImageData(0, 0, imgLogo.width, imgLogo.height), mx_w - imgLogo.width, mx_h - imgLogo.height);
                        if (file.type == "image/jpeg" || file.type == "image/JPG") {
                            dataURL = convasimg.toDataURL("image/jpeg", 1);
                        } else {
                            dataURL = convasimg.toDataURL("image/png");
                        }

                        var dataUrl = '"' + dataURL + '"';
                        var url = '"' + urll + '"';
                        var input_id = '"' + inputimg.id + '"';
                        var inputnamee = '"' + inputname + '"';

                        // <div class="">
                        var imageshow = "<div id='imgview" + count + "' class='mx-auto rounded-lg border-info-darker border-2 m-2 '><div class='object-center mx-auto text-center ' ><button class='btn uploadebtn text-darker bg-info p-4 text-2xl rounded-md border font-bold ' onclick='upLoad(" + dataUrl + "," + url + "," + input_id + ",$(this)," + inputnamee + ")'> تاكيد</button> </div></div>";
                        //                var im = "";


                        // $("#" + id).parent().parent()

                        console.log(inputimg.id);
                        if ($("#" + inputimg.id).attr('multiple') === undefined) {
                            //              $("#" + id).parent().html(convasimg).append(im);
                            $("#" + id).html(imageshow);
                            $("#imgview" + count++).prepend(convasimg);

                            //            console.log("is == undefinded");
                        } else {

                            $("#" + id).append(imageshow);
                            $("#imgview" + (count++) + " div").prepend(convasimg);

                        }
                    }
                    imgLogo.src = maskurl;

                } else {

                    if (file.type == "image/jpeg" || file.type == "image/JPG") {
                        dataURL = convasimg.toDataURL("image/jpeg", 1);
                    } else {
                        dataURL = convasimg.toDataURL("image/png");
                    }

                    var dataUrl = '"' + dataURL + '"';
                    var url = '"' + urll + '"';
                    var input_id = '"' + inputimg.id + '"';
                    var inputnamee = '"' + inputname + '"';

                    // <div class="">
                    var imageshow = "<div id='imgview" + count + "' class='mx-auto rounded-lg border-info-darker border-2 m-2 '><div class='object-center mx-auto text-center ' ><button class='btn uploadebtn text-darker bg-info p-4 text-2xl rounded-md border font-bold ' onclick='upLoad(" + dataUrl + "," + url + "," + input_id + ",$(this)," + inputnamee + ")'> تاكيد</button> </div></div>";
                    //                var im = "";


                    // $("#" + id).parent().parent()

                    console.log(inputimg.id);
                    if ($("#" + inputimg.id).attr('multiple') === undefined) {
                        //              $("#" + id).parent().html(convasimg).append(im);
                        $("#" + id).html(imageshow);
                        $("#imgview" + count++).prepend(convasimg);

                        //            console.log("is == undefinded");
                    } else {

                        $("#" + id).append(imageshow);
                        $("#imgview" + (count++) + " div").prepend(convasimg);

                    }
                }


                // var dataUrl = '"' + dataURL + '"';
                // var url = '"' + urll + '"';
                // var input_id = '"' + inputimg.id + '"';
                // var inputnamee = '"' + inputname + '"';

                // <div class="">
                //var imageshow = "<div id='imgview" + count + "' class='flex-1 rounded-lg border-blue-600 border m-2 '><div class='object-center mx-auto text-center ' ><button class='btn uploadebtn rounded-xl border text-darker ' onclick='upLoad(" + dataUrl + "," + url + "," + input_id + ",$(this)," + inputnamee + ")'> تاكيد</button> </div></div>";
                //                var im = "";

                // if ($("#" + inputimg.id).attr('multiple') === undefined) {
                //     //              $("#" + id).parent().html(convasimg).append(im);
                //     $("#" + id).html(imageshow);
                //     $("#imgview" + count++).prepend(convasimg);

                //     //            console.log("is == undefinded");
                // } else {

                //     $("#" + id).append(imageshow);
                //     $("#imgview" + (count++) + " div").prepend(convasimg);

                // }


                // $("#" + id).parent().append(im);


                // $("#con"+divid).addClass(' rounded-full h-32 w-32 mx-auto rounded-full image-full');

                //   uploadeimg(dataURL,divid,idimgurl,imgfile)
                //  $("#"+idimgurl).val(dataURL);
                //                $wire.set('imgurl',dataURL);
                // $wire.set("name","ali");



            }
            image.src = readerEvent.target.result;
        }

        //   return dataURL;

        reader.readAsDataURL(file);

        return 0;
    } else {
        //   inputimg.val('');
        alert('Please only select images in JPG- or PNG-format.' + file.type);
        return false;
    }

}






function convert_tobase_with_orginal_wh(e, color, inputimg, id, urll, inputname, w, h) {


    var file = e;

    if (file.type == "image/jpeg" || file.type == "image/png" || file.type == "image/webp" || file.type == "image/svg+xml" || file.type == "image/svg" || file.type == "image/jpg" || file.type == "image/JPG") {
        var reader = new FileReader();
        var dataURL;
        reader.onload = function(readerEvent) {

            var image = new Image();
            image.onload = function(imageEvent) {

                var ww = image.width;
                w = image.width;
                h = image.height;

                if (ww < w) {
                    w = ww;
                }
                // var h = image.height;
                console.log(w);
                console.log(h);
                console.log(h * w);




                if ((w * h) > 10000000) {
                    w = w / 6;
                    h = h / 6;
                }
                if ((w * h) > 1000000) {
                    w = w / 4;
                    h = h / 4;
                }
                console.log(w * h);


                var canvas = document.createElement('canvas');
                canvas.width = w;
                canvas.height = h;
                var chim = h;
                var chwi = w;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(image, 0, 0, w, h);
                ctx.fillStyle = color;

                var convasimg = document.createElement('canvas');
                convasimg.width = w;
                convasimg.height = h;
                // convasimg.id = 'con' + divid;
                var ctximg = convasimg.getContext('2d');
                ctximg.fillStyle = color;
                ctximg.fillRect(0, 0, w, h);
                ctximg.putImageData(ctx.getImageData(0, 0, w, h), 0, 0, 0, 0, w, h);






                // if (file.type == "image/jpeg" || file.type == "image/JPG") {
                //     dataURL = convasimg.toDataURL("image/jpeg", 1);
                //     //    console.log(dataURL);
                // } else {
                //     dataURL = convasimg.toDataURL("image/png");
                //     //  console.log(dataURL);
                // }
                //                console.log(dataURL);


                // $("#"+divid+"imgv").html(convasimg);
                convasimg.classList.add('h-64');

                // var dataUrl = '"' + dataURL + '"';
                // var url = '"' + urll + '"';
                // var input_id = '"' + inputimg.id + '"';
                // var inputnamee = '"' + inputname + '"'; // <div class="">
                // var imageshow = "<div id='imgview" + count + "' class='flex-1 rounded-lg border-blue-600 border m-2 '><div class='object-center mx-auto text-center ' ><button class='btn uploadebtn rounded-xl border text-darker ' onclick='upLoad(" + dataUrl + "," + url + "," + input_id + ",$(this)," + inputnamee + ")'> تاكيد</button> </div></div>";
                // //                var im = "";
                // if ($("#" + inputimg.id).attr('multiple') === undefined) {
                //     //              $("#" + id).parent().html(convasimg).append(im);
                //     $("#" + id).html(imageshow);
                //     $("#imgview" + count++).prepend(convasimg);

                //     //            console.log("is == undefinded");
                // } else {

                //     $("#" + id).append(imageshow);
                //     $("#imgview" + (count++) + " div").prepend(convasimg);

                // }

                if (withmask == true) {
                    var imgLogo = new Image();
                    var dataURL;
                    imgLogo.onload = function(imageEvent) {
                        //   convasimg.dr
                        ctximg.drawImage(imgLogo, w - imgLogo.width - 40, h - imgLogo.height - 40);
                        // ctximg.putImageData(ctxlogo.getImageData(0, 0, imgLogo.width, imgLogo.height), mx_w - imgLogo.width, mx_h - imgLogo.height);
                        if (file.type == "image/jpeg" || file.type == "image/JPG") {
                            dataURL = convasimg.toDataURL("image/jpeg", 1);
                        } else {
                            dataURL = convasimg.toDataURL("image/png");
                        }

                        var dataUrl = '"' + dataURL + '"';
                        var url = '"' + urll + '"';
                        var input_id = '"' + inputimg.id + '"';
                        var inputnamee = '"' + inputname + '"';

                        // <div class="">
                        var imageshow = "<div id='imgview" + count + "' class='mx-auto rounded-lg border-info-darker border-2 m-2 '><div class='object-center mx-auto text-center ' ><button class='btn uploadebtn text-darker bg-info p-4 text-2xl rounded-md border font-bold ' onclick='upLoad(" + dataUrl + "," + url + "," + input_id + ",$(this)," + inputnamee + ")'> تاكيد</button> </div></div>";
                        //                var im = "";


                        // $("#" + id).parent().parent()

                        console.log(inputimg.id);
                        if ($("#" + inputimg.id).attr('multiple') === undefined) {
                            //              $("#" + id).parent().html(convasimg).append(im);
                            $("#" + id).html(imageshow);
                            $("#imgview" + count++).prepend(convasimg);

                            //            console.log("is == undefinded");
                        } else {

                            $("#" + id).append(imageshow);
                            $("#imgview" + (count++) + " div").prepend(convasimg);

                        }
                    }
                    imgLogo.src = maskurl;

                } else {

                    if (file.type == "image/jpeg" || file.type == "image/JPG") {
                        dataURL = convasimg.toDataURL("image/jpeg", 1);
                    } else {
                        dataURL = convasimg.toDataURL("image/png");
                    }

                    var dataUrl = '"' + dataURL + '"';
                    var url = '"' + urll + '"';
                    var input_id = '"' + inputimg.id + '"';
                    var inputnamee = '"' + inputname + '"';

                    // <div class="">
                    var imageshow = "<div id='imgview" + count + "' class='mx-auto rounded-lg border-info-darker border-2 m-2 '><div class='object-center mx-auto text-center ' ><button class='btn uploadebtn text-darker bg-info p-4 text-2xl rounded-md border font-bold ' onclick='upLoad(" + dataUrl + "," + url + "," + input_id + ",$(this)," + inputnamee + ")'> تاكيد</button> </div></div>";
                    //                var im = "";


                    // $("#" + id).parent().parent()

                    console.log(inputimg.id);
                    if ($("#" + inputimg.id).attr('multiple') === undefined) {
                        //              $("#" + id).parent().html(convasimg).append(im);
                        $("#" + id).html(imageshow);
                        $("#imgview" + count++).prepend(convasimg);

                        //            console.log("is == undefinded");
                    } else {

                        $("#" + id).append(imageshow);
                        $("#imgview" + (count++) + " div").prepend(convasimg);

                    }
                }





                // $("#" + id).parent().append(im);


                // $("#con"+divid).addClass(' rounded-full h-32 w-32 mx-auto rounded-full image-full');

                //   uploadeimg(dataURL,divid,idimgurl,imgfile)
                //  $("#"+idimgurl).val(dataURL);
                //                $wire.set('imgurl',dataURL);
                // $wire.set("name","ali");



            }
            image.src = readerEvent.target.result;
        }

        //   return dataURL;

        reader.readAsDataURL(file);

        return 0;
    } else {
        //   inputimg.val('');
        alert('Please only select images in JPG- or PNG-format.' + file.type);
        return false;
    }

}











function convert_tobase(e, color, inputimg, id, urll, inputname, maxsize, mx_h = 800, mx_w = 800, withmask = false, maskurl = '') {



    var file = e;
    // alert(id);
    if (file.type == "image/jpeg" || file.type == "image/png" || file.type == "image/webp" || file.type == "image/svg+xml" || file.type == "image/svg" || file.type == "image/jpg" || file.type == "image/JPG") {
        var reader = new FileReader();
        reader.onload = function(readerEvent) {

            var image = new Image();
            image.onload = function(imageEvent) {
                //if (image.height < max_size)
                var max_size = maxsize;

                // if (image.height < max_size)
                //   max_size = 450;



                //   ma


                max_size = Number(max_size);
                var w = image.width;
                var h = image.height;

                if (w > h) {
                    if (w > max_size) {
                        h *= max_size / w;
                        w = max_size;
                    }
                } else {
                    if (h > max_size) {
                        w *= max_size / h;
                        h = max_size;
                    }
                }

                var canvas = document.createElement('canvas');
                canvas.width = w;
                canvas.height = h;
                var chim = mx_h - h;
                var chwi = mx_w - w;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(image, 0, 0, w, h);
                ctx.fillStyle = color;
                canvas.id = 'red';
                var convasimg = document.createElement('canvas');
                convasimg.width = mx_w + 5;
                convasimg.height = mx_h + 5;
                // convasimg.id = 'con' + divid;
                var ctximg = convasimg.getContext('2d');
                ctximg.fillStyle = color;
                ctximg.fillRect(0, 0, mx_w + 5, mx_h + 5);
                ctximg.putImageData(ctx.getImageData(0, 0, w, h), chwi / 2, chim / 2, 0, 0, w, h);
                convasimg.classList.add("h-64");




                if (withmask == true) {
                    var imgLogo = new Image();
                    var dataURL;
                    imgLogo.onload = function(imageEvent) {
                        //   convasimg.dr
                        ctximg.drawImage(imgLogo, mx_w - imgLogo.width - 40, mx_h - imgLogo.height - 40);
                        // ctximg.putImageData(ctxlogo.getImageData(0, 0, imgLogo.width, imgLogo.height), mx_w - imgLogo.width, mx_h - imgLogo.height);
                        if (file.type == "image/jpeg" || file.type == "image/JPG") {
                            dataURL = convasimg.toDataURL("image/jpeg", 1);
                        } else {
                            dataURL = convasimg.toDataURL("image/png");
                        }

                        var dataUrl = '"' + dataURL + '"';
                        var url = '"' + urll + '"';
                        var input_id = '"' + inputimg.id + '"';
                        var inputnamee = '"' + inputname + '"';

                        // <div class="">
                        var imageshow = "<div id='imgview" + count + "' class='mx-auto rounded-lg border-info-darker border-2 m-2 '><div class='object-center mx-auto text-center ' ><button class='btn uploadebtn text-darker bg-info p-4 text-2xl rounded-md border font-bold ' onclick='upLoad(" + dataUrl + "," + url + "," + input_id + ",$(this)," + inputnamee + ")'> تاكيد</button> </div></div>";
                        //                var im = "";


                        // $("#" + id).parent().parent()

                        console.log(inputimg.id);
                        if ($("#" + inputimg.id).attr('multiple') === undefined) {
                            //              $("#" + id).parent().html(convasimg).append(im);
                            $("#" + id).html(imageshow);
                            $("#imgview" + count++).prepend(convasimg);

                            //            console.log("is == undefinded");
                        } else {

                            $("#" + id).append(imageshow);
                            $("#imgview" + (count++) + " div").prepend(convasimg);

                        }
                    }
                    imgLogo.src = maskurl;

                } else {

                    if (file.type == "image/jpeg" || file.type == "image/JPG") {
                        dataURL = convasimg.toDataURL("image/jpeg", 1);
                    } else {
                        dataURL = convasimg.toDataURL("image/png");
                    }

                    var dataUrl = '"' + dataURL + '"';
                    var url = '"' + urll + '"';
                    var input_id = '"' + inputimg.id + '"';
                    var inputnamee = '"' + inputname + '"';

                    // <div class="">
                    var imageshow = "<div id='imgview" + count + "' class='mx-auto rounded-lg border-info-darker border-2 m-2 '><div class='object-center mx-auto text-center ' ><button class='btn uploadebtn text-darker bg-info p-4 text-2xl rounded-md border font-bold ' onclick='upLoad(" + dataUrl + "," + url + "," + input_id + ",$(this)," + inputnamee + ")'> تاكيد</button> </div></div>";
                    //                var im = "";


                    // $("#" + id).parent().parent()

                    console.log(inputimg.id);
                    if ($("#" + inputimg.id).attr('multiple') === undefined) {
                        //              $("#" + id).parent().html(convasimg).append(im);
                        $("#" + id).html(imageshow);
                        $("#imgview" + count++).prepend(convasimg);

                        //            console.log("is == undefinded");
                    } else {

                        $("#" + id).append(imageshow);
                        $("#imgview" + (count++) + " div").prepend(convasimg);

                    }
                }




            }
            image.src = readerEvent.target.result;
        }
        reader.readAsDataURL(file);
        return 0;
    } else {
        inputimg.val('');
        alert('Please only select images in JPG- or PNG-format.' + file.type);
        return false;
    }



}
















function uploadeimg(dataURL, divid, idimgurl, imgfile) {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    var urll = "/admin/uploade";

    var loadbtn = '<div id="lodbtn' + divid + '" class="absolute text-center bottom-0 z-30  "> <button type="button" class="btn loading mx-auto my-auto text-blue-500 bg-white p-4 btn-circle mx-auto  btn-ghost"></button> </div>';
    var errorbtn = '<div id="errorbtn' + divid + '" class="absolute text-center bottom-0 z-30  "> <button type="button" class="btn  mx-auto my-auto text-red-800   btn-circle  bg-white btn-ghost">retry</button> </div>';
    //  var errorbtn='<div id="errbtn'+divid+'" class="absolute text-center bottom-0 z-30  "> <button class="btn  mx-auto my-auto text-red-800   btn-circle  bg-white btn-ghost">retry</button> </div>';

    $.ajax({
        url: urll,
        method: 'POST',
        data: { 'data64': dataURL },
        dataType: 'JSON',

        beforeSend: () => {

            $("#" + divid).append(loadbtn);

        },
        error: function(data) {

            $("#" + divid).append(errorbtn);
            $("#lodbtn" + divid).remove();
            $("#errorbtn" + divid + " button").on('click', function() {
                uploadeimg(data.data64, divid, idimgurl);
            });
            console.log(data);
        },
        crossDomain: false,
        success: function(data) {

            console.log(data);

            if (data.error == 'no') {




                if ($("#" + imgfile).attr('multiple') === undefined && $("#" + idimgurl).val() !== "") {

                    deleteimg($("#" + idimgurl).val(), '/product.deleteimg');
                    $('#' + idimgurl).val(data.url);

                } else if ($("#" + idimgurl).val() === "" || $("#" + idimgurl).val() === undefined) {
                    $('#' + idimgurl).val(data.url);
                    // $wire.set('imgurl',"'"+data.url+"'");
                    //$wire.__instance;
                    $("#lodbtn" + divid).hide(200);
                    $("#lodbtn" + divid).remove();

                    $("#" + divid).addClass("bg-blue-600");
                } else {
                    if ($('#' + idimgurl).val() == undefined || $('#' + idimgurl).val() == "")
                        $('#' + idimgurl).val(data.url);
                    else
                        $('#' + idimgurl).val(data.url + "|" + $('#' + idimgurl).val());
                }


                $("#lodbtn" + divid).hide(200);
                $("#lodbtn" + divid).remove();

                $("#" + divid).addClass("bg-blue-600");
            } else {
                $("#" + divid).append(errorbtn);
                $("#lodbtn" + divid).remove();
                $("#errorbtn" + divid + " button").on('click', function() {
                    uploadeimg(dataURL, divid, idimgurl);
                });


            }
        },


    });










}







function deleteimg(imgurl, url) {



    $.ajax({
        method: 'get',
        url: url,
        data: { 'imgurl': imgurl },
        dataType: 'JSON',
        success: (data) => {

            alert('successful');
            console.log(data);

        },
        error: (data) => {
            console.log(data);
        },


    });


}








function imgsuploades(e) {

    var imgsrow = $("#rowsofimgs");

    alert(ic);
    for (var i = 0; i < e.target.files.length; i++) {

        var ic = $("#ic").val();

        imgsrow.append(' <div id="imgview' + ic + '" class="flex-1 rounded-lg m-2 ">\n' +
            '                                <div id="imgview' + ic + 'imgv" class="object-center mx-auto text-center  py-4 mb-4 " > \n' + ic +
            '                                </div>\n' +
            '                            </div>');

        fileChange(e.target.files[i], "imgview" + ic, 'imgsurl', 600, "imgsuploade");


        ic++;
        var ic = $("#ic").val(ic);

        //alert(ic);




    }






}