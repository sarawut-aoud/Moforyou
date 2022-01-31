function trgger(e){
    document.getElementById(e).click();
    new Showprogress();
  }
  function Showprogress() {
      var indicator = document.querySelector('div.indicator'); 
      var preview = document.querySelector('div.preview');
      var divand = document.createElement('div');
      divand.setAttribute('id', 'progressand');
      divand.style.display = "none";	
      indicator.appendChild(divand);
      var div = document.createElement('div');
      div.setAttribute('class', 'progress');
      divand.appendChild(div);
      var dynamic = document.createElement('div');
      dynamic.setAttribute('id', 'dynamic');
      dynamic.setAttribute('class', 'progress-bar progress-bar-striped bg-info progress-bar-animated');
      dynamic.setAttribute('role', 'progressbar');
      dynamic.setAttribute('aria-valuenow', '0');
      dynamic.setAttribute('aria-valuemin', '0');
      dynamic.setAttribute('aria-valuemax', '100');
      dynamic.style.width = "0%";
      div.appendChild(dynamic);
      var percent = document.createElement('span');
      percent.setAttribute('class', 'percent');
      percent.textContent = '0%';
      dynamic.appendChild(percent);
      var load = document.createElement('div');
      load.setAttribute('class', 'ml-auto mr-auto lds-contuner');
      load.setAttribute('id', 'loader');
      load.style.display = "none";
      preview.appendChild(load);
      var loader = document.createElement('div');
      loader.setAttribute('class', 'lds-ellipsis');
      load.appendChild(loader);	
     for (let x = 0; x < 4; x++) {
        var divm = document.createElement('div');
        loader.appendChild(divm);
     }
  }
  function previewFiles() {
     var preview = document.querySelector('div.preview');
     var files   = document.querySelector('input[type=file]').files;
     function readAndPreview(file) {
        if ( /\.(jpe?g|png|gif|mp4|webm|ogg|ogv|mp3|wav)$/i.test(file.name)) {	
          if (file.size < 10 * 1024 * 1024) { // MAX 10 mb
               var reader = new FileReader();
               var spc = '\u00A0';
                  function returnFileSize(n) {
                     if(n < 1024) {
                        return n + ' octets';
                     } else if(n >= 1024 && n < 1048576) {
                        return (n/1024).toFixed(1)+spc+'Ko';
                     } else if(n >= 1048576) {
                        return (n/1048576).toFixed(1)+spc+'Mo';
                     }
                  }
                  function abortRead() {
                     reader.abort();
                  }
                  reader.onloadstart = function(e) {
                 document.querySelector("#progressand").style.display = "block";
                 document.querySelector("#loader").style.display = "block";
              }
                  reader.onprogress = function(e) {
                     if (e.lengthComputable) {
                        var percentLoaded = Math.round((e.loaded / e.total) * 99);
                        if (percentLoaded < 99) {
                          document.querySelector('#dynamic').style.width = percentLoaded + '%';
                          document.querySelector('.percent').textContent = percentLoaded + '%';
                        }
                     }
                  }
                  reader.onloadend = function(e) {
                      document.querySelector('#dynamic').style.width = '100%';
                      document.querySelector('.percent').textContent = '100%';
                      setTimeout(function(){
                 $("#progressand").remove();	
                 $("#loader").remove();	
                      }, 900);
              }
                 reader.onabort = function(e) {
                    return iziError(failed, 'File read cancelled');
                 }
               reader.addEventListener('error', function ()  {
                     return iziError(failed, 'Error occurred reading file: ${file.name}');
               })	   
               reader.addEventListener("load", function () {
                   var div = document.createElement('div');
                   div.setAttribute('class', 'Imgpreview mb-3');// animated zoomIn
                   preview.appendChild(div);
                   var i = document.createElement('i');
                   i.setAttribute('class', 'material-icons remove');
                   i.textContent = "close";
                   div.appendChild(i);
                   if ( /\.(jpe?g|png|gif|)$/i.test(file.name)) {
                       var image = new Image();
                 //image.addEventListener("load", function () {/*image.width+'×'+image.height*/})
                       image.setAttribute('data-tippy-content',file.name+spc+'\u002f'+spc+'file size'+spc+returnFileSize(file.size));
                 image.setAttribute('onclick', 'this.classList.toggle("Imgpreview-zoom");');
                       image.src = this.result;
                       div.appendChild(image);
                 } else if ( /\.(mp4|webm|ogg|ogv)$/i.test(file.name)) {
                       var video = document.createElement('video');
                       video.setAttribute('width', '100%');
                       video.setAttribute('data-tippy-content',file.name+spc+'\u002f'+spc+'file size'+spc+returnFileSize(file.size));
                 video.setAttribute('onclick', 'this.classList.toggle("Imgpreview-zoom");');
                       video.muted = false;
                       video.volume = 0;
                       video.autoplay = true;
                       video.loop = true;
                       video.preload = "auto";
                       video.src = this.result;
                       div.appendChild(video);
                 } else if ( /\.(mp3|wav|ogg)$/i.test(file.name)) {
                     var audio = document.createElement('audio');
                     audio.setAttribute('data-tippy-content', file.name+spc+'\u002f'+spc+'file size'+spc+returnFileSize(file.size));
                     audio.setAttribute('controlslist', 'nodownload');
                     audio.controls = true;
                     audio.preload = "auto";
                     audio.src = this.result;
                     div.appendChild(audio);
                 }
                 tippy([image, video, audio]);
                   $(i).click(function(){
                     $(div).removeClass('zoomIn').addClass('flipOutX');// hinge
                     setTimeout(function(){$(i).parent(div).remove();},500);
                   });
               }, false);
               reader.readAsDataURL(file);  
           } else {
               return iziToast.error({title: 'failed',message: 'max 10 MB',iconText: 'error_outline'});
           } 
        } else {
          return  iziToast.error({title: 'failed',message: 'Please provide avalid file. Accepted formats include .mp4, mp3, .png, .jpg, and .gif.',iconText: 'error_outline'});
        }
     } if (files) {
        [].forEach.call(files, readAndPreview);
     }
  }
  autosize(document.querySelectorAll('textarea'));
  
  /*emoji*/
  ! function(f) {
      if ("object" == typeof exports && "undefined" != typeof module) module.exports = f();
      else if ("function" == typeof define && define.amd) define([], f);
      else {
          ("undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this).MDEmoji = f()
      }
  }(function() {
      return function e(t, n, r) {
          function s(o, u) {
              if (!n[o]) {
                  if (!t[o]) {
                      var a = "function" == typeof require && require;
                      if (!u && a) return a(o, !0);
                      if (i) return i(o, !0);
                      var f = new Error("Cannot find module '" + o + "'");
                      throw f.code = "MODULE_NOT_FOUND", f
                  }
                  var l = n[o] = {
                      exports: {}
                  };
                  t[o][0].call(l.exports, function(e) {
                      var n = t[o][1][e];
                      return s(n || e)
                  }, l, l.exports, e, t, n, r)
              }
              return n[o].exports
          }
          for (var i = "function" == typeof require && require, o = 0; o < r.length; o++) s(r[o]);
          return s
      }({
          1: [function(require, module, exports) {
              ! function(global, factory) {
                  if (void 0 !== exports) factory(module);
                  else {
                      var mod = {
                          exports: {}
                      };
                      factory(mod), global.mdEmoji = mod.exports
                  }
              }(this, function(module) {
                  "use strict";
                  var _createClass = function() {
                          function defineProperties(target, props) {
                              for (var i = 0; i < props.length; i++) {
                                  var descriptor = props[i];
                                  descriptor.enumerable = descriptor.enumerable || !1, descriptor.configurable = !0, "value" in descriptor && (descriptor.writable = !0), Object.defineProperty(target, descriptor.key, descriptor)
                              }
                          }
                          return function(Constructor, protoProps, staticProps) {
                              return protoProps && defineProperties(Constructor.prototype, protoProps), staticProps && defineProperties(Constructor, staticProps), Constructor
                          }
                      }(),
                      MDEmoji = function() {
                          function MDEmoji() {
                              ! function(instance, Constructor) {
                                  if (!(instance instanceof Constructor)) throw new TypeError("Cannot call a class as a function")
                              }(this, MDEmoji), this.initiate()
                          }
                          return _createClass(MDEmoji, [{
                              key: "initiate",
                              value: function() {
                                  var _this = this;
                                  document.querySelectorAll('[data-emoji="true"], [data-emoji-large="true"]').forEach(function(element) {
                                      _this.generateElements(element)
                                  })
                              }
                          }, {
                              key: "generateElements",
                              value: function(emojiInput) {
                                  var clickLink = function(event) {
                                          var caretPos = emojiInput.selectionStart;
                                          emojiInput.value = emojiInput.value.substring(0, caretPos) + " " + event.target.innerHTML + emojiInput.value.substring(caretPos), emojiPicker.style.display = "block", "undefined" != typeof angular && angular.element(emojiInput).triggerHandler("change")
                                      },
                                      clickCategory = function(event) {
                                          emojiInput.selectionStart;
                                          emojiPicker.style.display = "block";
                                          for (var hideUls = emojiPicker.querySelectorAll("ul"), i = 1, l = hideUls.length; i < l; i++) hideUls[i].style.display = "none";
                                          var backgroundToggle = emojiPicker.querySelectorAll(".category a");
                                          for (i = 0, l = backgroundToggle.length; i < l; i++) backgroundToggle[i].style.background = "none";
                                          emojiPicker.querySelector("." + event.target.id).style.display = "grid", emojiPicker.querySelector("#" + event.target.id).style.background = "#c2c2c2"
                                      };
                                  emojiInput.style.width = "100%";
                                  var emojiContainer = document.createElement("div");
                                  emojiContainer.style.position = "relative", emojiInput.parentNode.replaceChild(emojiContainer, emojiInput), emojiContainer.appendChild(emojiInput);
                                  var emojiPicker = document.createElement("div");
                                  emojiPicker.tabIndex = 0, emojiPicker.classList.add("emoji"), emojiPicker.classList.add("animated"), emojiPicker.classList.add("bounceIn"), emojiInput.hasAttribute("data-emoji-large") ? (emojiPicker.style.display = "block") : (emojiPicker.style.display = "none");
                                  var emojiTrigger = document.createElement("a");
                                  emojiTrigger.classList.add("emojiTrigger"), emojiTrigger.setAttribute("href", "javascript:void(0)"),emojiTrigger.setAttribute("data-tippy", "Add Emoji"), emojiTrigger.innerHTML = '<i class="material-icons">&#xE24e</i>', emojiTrigger.onclick = function() {
                                      "none" === emojiPicker.style.display ? emojiPicker.style.display = "block" : "block" === emojiPicker.style.display && (emojiPicker.style.display = "none"), emojiPicker.focus()
                                  }, emojiInput.hasAttribute("data-emoji-large") || emojiContainer.appendChild(emojiTrigger), window.addEventListener("click", function(e) {
                                      emojiInput.hasAttribute("data-emoji-large") || "block" === emojiPicker.style.display && (emojiPicker.contains(e.target) || emojiTrigger.contains(e.target) || (emojiPicker.style.display = "none"))
                                  });
                                  var facesCategory = document.createElement("ul");
                                  facesCategory.classList.add("faces"), facesCategory.classList.add("scroll-bar");
                                  var animalsCategory = document.createElement("ul");
                                  animalsCategory.classList.add("animals"), animalsCategory.classList.add("scroll-bar");
                                  var foodCategory = document.createElement("ul");
                                  foodCategory.classList.add("food"), foodCategory.classList.add("scroll-bar");
                                  var sportCategory = document.createElement("ul");
                                  sportCategory.classList.add("sport"), sportCategory.classList.add("scroll-bar");
                                  
                                  var transportCategory = document.createElement("ul");
                                  transportCategory.classList.add("transport"), transportCategory.classList.add("scroll-bar");
                                  
                                  var symbolsCategory = document.createElement("ul");
                                  symbolsCategory.classList.add("symbols"), symbolsCategory.classList.add("scroll-bar");
                                  
                                  var objectsCategory = document.createElement("ul");
                                  objectsCategory.classList.add("objects"), objectsCategory.classList.add("scroll-bar");
                                  var emojiCategory = document.createElement("ul");
                                  emojiCategory.classList.add("category");
                                  var emojiCategories = new Array;
                                  emojiCategories.push({
                                      name: "faces",
                                      icon: '<i id="faces" data-name="Layer 1" class="material-icons">&#xE24e</i>'
                                  }), emojiCategories.push({
                                      name: "animals",
                                      icon: '<i id="animals" data-name="Layer 1" class="material-icons">&#xE91d</i>'
                                  }), emojiCategories.push({
                                      name: "food",
                                      icon: '<i id="food" data-name="Layer 1" class="material-icons">&#xE56c</i>'
                                  }), emojiCategories.push({
                                      name: "sport",
                                      icon: '<i id="sport" data-name="Layer 1" class="material-icons">&#xEb43</i>'
                                  }), emojiCategories.push({
                                      name: "transport",
                                      icon: '<i id="transport" data-name="Layer 1" class="material-icons">&#xE570</i>'
                                  }), emojiCategories.push({
                                      name: "objects",
                                      icon: '<i id="objects" data-name="Layer 1" class="material-icons">&#xE839</i>'
                                  }), emojiCategories.push({
                                      name: "symbols",
                                      icon: '<i id="symbols" data-name="Layer 1" class="material-icons">&#xEb4a</i>'
                                  });
                                  emojiCategories.map(function(item) {
                                      var emojiLink = document.createElement("a");
                                      emojiLink.classList.add("nav-emoji"), emojiLink.setAttribute("href", "javascript:void(0)"), emojiLink.id = String(item.name), "faces" == String(item.name) && (emojiLink.style.background = "#c2c2c2"), emojiLink.innerHTML = String(item.icon), emojiLink.onmousedown = clickCategory, emojiCategory.appendChild(emojiLink)
                                  }), [128512,128513,128514,129315,128515,128516,128517,128518,128521,128522,128526,128525,128536,128535,128537,128538,9786,128578,129303,129300,128528,128529,128566,128580,128527,128547,128549,128558,129296,128559,128554,128555,128564,128524,129299,128539,128540,128541,129316,128530,128531,128532,128533,128579,129297,128562,9785,128577,128534,128542,128543,128548,128546,128557,128550,128551,128552,128553,128556,128560,128561,128563,128565,128545,128544,128519,129312,129313,129317,128567,129298,129301,129314,129319,128520,128127,128121,128122,128128,9760,128123,128125,128126,129302,128169,128570,128568,128569,128571,128572,128573,128576,128575,128574,128584,128585,128586,128102,128103,128104,128105,128116,128117,128118,128124,128110,128373,128130,128119,128115,128113,127877,129334,128120,129332,128112,129333,129328,128114,128589,128590,128581,128582,128129,128587,128583,129318,129335,128134,128135,128694,127939,128131,128378,128111,128372,128483,128100,128101,128107,128108,128109,128143,128106,128170,129331,128072,128073,9757,128070,128405,128071,9996,129310,128406,129304,129305,128400,9995,128076,128077,128078,9994,128074,129307,129308,129306,128075,128079,9997,128080,128588,128591,129309,128133,128066,128067,128099,128064,128065,128069,128068,128139,10084,128147,128152,128148,128149,128150,128151,128153,128154,128155,128156,128420,128157,128158,128159,10083,128140,128164,128162,128163,128165,128166,128168,128171,128172,128488,128495,128173,128371,128083,128374,128085,128084,128086,128087,128088,128089,128090,128091,128092,128093,128717,127890,128094,128095,128096,128097,128098,128081,128082,127913,127891,9937,128255,128132,128141,128142].map(function(item) {
                                      var emojiLink = document.createElement("a");
                                      emojiLink.classList.add("md-emoji"), emojiLink.setAttribute("href", "javascript:void(0)"), emojiLink.innerHTML = String.fromCodePoint(item), emojiLink.onmousedown = clickLink, facesCategory.appendChild(emojiLink)
                                  }), [128053,128018,129421,128054,128021,128041,128058,129418,128049,128008,129409,128047,128005,128006,128052,128014,129420,129412,128046,128002,128003,128004,128055,128022,128023,128061,128015,128017,128016,128042,128043,128024,129423,128045,128001,128000,128057,128048,128007,128063,129415,128059,128040,128060,128062,128056,,129417,129414,129413,128330,128039,128038,128037,128036,128035,128019,128020,129411,128010,128034,129422,128013,128050,128009,128051,128011,128044,128031,128032,128033,129416,128025,128026,129408,129424,129425,129419,128012,128027,128028,128029,128030,128375,128376,129410,128144,127800,128174,127989,127801,129344,127802,127803,127804,127799,127793,127794,127795,127796,127797,127806,127807,9752,127808,127809,127810,127811].map(function(item) {
                                      var emojiLink = document.createElement("a");
                                      emojiLink.classList.add("md-emoji"), emojiLink.setAttribute("href", "javascript:void(0)"), emojiLink.innerHTML = String.fromCodePoint(item), emojiLink.onmousedown = clickLink, animalsCategory.appendChild(emojiLink)
                                  }), [127816,127817,127818,127819,127820,127821,127822,127823,127824,127825,127826,127827,129373,127813,127846,127847,127848,127849,127850,127874,127856,127851,127852,127853,127854,127855,127868,129371,9749,127861,127862,127870,127863,127864,127865,127866,127867,129346,129347,129361,127814,129364,129365,127805,127798,129362,127812,129372,127792,127838,129360,129366,129374,129472,127830,127831,129363,127828,127839,127829,127789,127790,127791,129369,129370,127859,129368,127858,129367,127871,127857,127832,127833,127834,127835,127836,127837,127840,127842,127843,127844,127845,127841,127869,127860,129348,128298,127994].map(function(item) {
                                      var emojiLink = document.createElement("a");
                                      emojiLink.classList.add("md-emoji"), emojiLink.setAttribute("href", "javascript:void(0)"), emojiLink.innerHTML = String.fromCodePoint(item), emojiLink.onmousedown = clickLink, foodCategory.appendChild(emojiLink)
                                  }), [9917,9918,127936,127952,127944,127945,127934,127921,127923,127951,127953,127954,127955,127992,129354,129355,129349,127919,9971,9976,127907,127933,127935,127942,129353,129352,129351,127941,127894,129338,127943,9975,127938,127948,127940,128675,127946,9977,127947,128692,128693,129336,129340,129341,129342,129337,127918,128377,127922,9824,9829,9830,9827,127183,126980,127924].map(function(item) {
                                      var emojiLink = document.createElement("a");
                                      emojiLink.classList.add("md-emoji"), emojiLink.setAttribute("href", "javascript:void(0)"), emojiLink.innerHTML = String.fromCodePoint(item), emojiLink.onmousedown = clickLink, sportCategory.appendChild(emojiLink)
                                  }), [127757,127758,127759,127760,128506,128510,127956,9968,127755,128507,127957,127958,127964,127965,127966,127967,127963,127959,127960,127961,127962,127968,127969,127970,127971,127972,127973,127974,127976,127977,127978,127979,127980,127981,127983,127984,128146,128508,128509,9962,128332,128333,9961,128331,9970,9978,127745,127747,127748,127749,127750,127751,127753,9832,127756,127904,127905,127906,128136,127914,127917,128444,127912,127920,128642,128643,128644,128645,128646,128647,128648,128649,128650,128669,128670,128651,128652,128653,128654,128656,128657,128658,127915,128659,128660,128661,128662,128663,,128664,128665,128666,128667,128668,128690,128756,128757,127950,127949,128655,128739,128740,9981,128680,128677,128678,128679,128721,9875,9973,128758,128676,128755,9972,128741,128674,9992,128745,128747,128748,128186,128641,128671,128672,128673,128640,128752,128718,128682,128716,128719,128715,128701,128703,128704,128705,8987,9203,8986,9200,9201,9202,128368,128347,128359,128336,128348,128337,128349,128338,128350,128339,128351,128340,128352,128341,128353,128342,128354,128343,128355,128344,128356,128345,128357,128346,128358,127761,127762,127763,127764,127765,127766,127767,127768,127769,127770,127771,127772,127777,9728,127773,127774,11088,127775,127776,9729,9925,9928,127780,127781,127782,127783,127784,127785,127786,127787,127788,127744,127752,127746,9730,9748,9969,9889,10052,9731,9924,9732,128293,128167,127754,].map(function(item) {
                                      var emojiLink = document.createElement("a");
                                      emojiLink.classList.add("md-emoji"), emojiLink.setAttribute("href", "javascript:void(0)"), emojiLink.innerHTML = String.fromCodePoint(item), emojiLink.onmousedown = clickLink, transportCategory.appendChild(emojiLink)
                                  }), [128683,9940,128696,9888,128691,128685,128687,128689,128695,128245,128286,9762,9763,127975,128686,128688,9855,128697,128698,128699,128700,128702,128706,128707,128708,128709,128259,128260,128281,128282,128283,128284,128285,128720,9883,128329,10017,9784,9775,10013,9766,9770,9774,128334,128303,11014,8599,10145,8600,11015,,8601,11013,8598,8597,8596,8617,8618,10548,10549,128259,128260,128281,128282,128283,128284,128285,9851,128219,9884,128304,128305,11093,9989,9745,10004,10006,10060,10062,10133,10134,10135,10160,10175,12349,10035,10036,10055,8252,8265,10067,10068,10069,10071,12336,169,174,8482,9800,9801,9802,9803,9804,9805,9806,9807,9808,9809,9810,9811,9934,128256,128257,128258,9654,9193,9197,9199,9664,9194,9198,128316,9195,128317,9196,9208,9209,9210,9167,127910,128261,128262,128246,128243,128244,128287,128288,128289,128290,128291,128292,127344,127374,127345,127377,127378,127379,8505,127380,9410,127381,127382,127358,,127383,127359,127384,127385,127386,127489,127490,127543,127542,127535,127568,127545,127514,127538,127569,127544,127540,127539,12951,12953,127546,127541,9642,9643,9723,9724,9725,9726,11035,11036,128310,128311,128312,128313,128314,128315,128160,128280,128306,128307,9898,9899,128308,128309,127937,128681,127884,127988,127987].map(function(item) {
                                      var emojiLink = document.createElement("a");
                                      emojiLink.classList.add("md-emoji"), emojiLink.setAttribute("href", "javascript:void(0)"), emojiLink.innerHTML = String.fromCodePoint(item), emojiLink.onmousedown = clickLink, symbolsCategory.appendChild(emojiLink)
                                  }), [128175,128263,128264,128265,128266,128226,128227,128239,128276,128277,127932,127925,127926,127897,127898,127899,127908,127911,128251,127927,127928,127929,127930,127931,129345,128241,128242,9742,128222,128223,128224,128267,128268,128187,128421,128424,9000,128433,128434,128189,128190,128191,128192,127909,127902,128253,127916,128250,128247,128248,128249,128252,128269,128270,128300,128301,128225,128367,128161,128294,127982,128212,128213,128214,128215,128216,128217,128218,128211,128210,128195,128220,128196,128240,128478,128209,128278,127991,128176,128180,128181,128182,128183,128184,128179,128185,128177,128178,9993,128231,128232,128233,128228,128229,128230,128235,128234,128236,128237,128238,128499,9999,10002,128395,128394,,128396,128397,128221,128188,128193,128194,128450,128197,128198,128466,128467,128199,128200,128201,128202,128203,128204,128205,128206,128391,128207,128208,9986,128451,128452,128465,128274,128275,128271,128272,128273,128477,128296,9935,9874,128736,128481,9876,128299,127993,128737,128295,128297,9881,128476,9879,9878,128279,9939,128137,128138,128684,9904,9905,128511,128738,128302,128722,127875,127876,127878,127879,10024,127880,127881,127882,127883,127885,127886,127887,127888,127889,127872,127873,127895,127903].map(function(item) {
                                      var emojiLi = document.createElement("li");
                                      emojiLi.style.display = "inline-block", emojiLi.style.margin = "5px";
                                      var emojiLink = document.createElement("a");
                                      emojiLink.classList.add("md-emoji"), emojiLink.setAttribute("href", "javascript:void(0)"), emojiLink.innerHTML = String.fromCodePoint(item), emojiLink.onmousedown = clickLink, objectsCategory.appendChild(emojiLink)
                                  }), emojiPicker.appendChild(emojiCategory), emojiPicker.appendChild(facesCategory), emojiPicker.appendChild(animalsCategory), emojiPicker.appendChild(foodCategory), emojiPicker.appendChild(sportCategory), emojiPicker.appendChild(transportCategory), emojiPicker.appendChild(symbolsCategory), emojiPicker.appendChild(objectsCategory), emojiContainer.appendChild(emojiPicker)
                              }
                          }]), MDEmoji
                      }();
                  module.exports = MDEmoji
              })
          }, {}]
      }, {}, [1])(1)
  }); 
  /*and emoji*/
  new MDEmoji();
  
  $('.scroll-bar').each(function() {
    var ps = new PerfectScrollbar($(this)[0], {wheelSpeed: 0.4,minScrollbarLength: 100,suppressScrollX: true}); 
  });
  
  
  
  var psA = new PerfectScrollbar('.modal');
  iziToast.settings({
    theme: 'dark',
    timeout: 5000,
    drag: true,
    pauseOnHover: true,
    animateInside: true,
    icon: 'material-icons',
    transitionIn: 'bounceInLeft',
    progressBarColor: '#ff0000',
    transitionOut: 'flipOutX',
    color: '#f44336',
    position: 'topRight'
  });