/*global $*/

// DOM読み込み前
// headerの生成
function header(rootDir){
  $.ajax({
      url: rootDir + "include/header.html", // ディレクトリ変更
      cache: false,
      async: false,
      dataType: 'html',
      success: function(html){
          html = html.replace(/\{\$root\}/g, rootDir); 
          document.write(html);          
      }
  });
}

// DOM読み込み後
$(function(){

  //buttom navの機能
  $('#menu').click(function(){
    $('#menu, nav a').toggleClass("on");
    $('nav li').stop().slideToggle(300);
    if ($('#menu').text()==="MENU"){
      $('#menu').text("×").css("font-size","2.0rem");
    }else{
      $('#menu').text("MENU").css("font-size","1.0rem");
    }
  });




  function css_changer(target,obj) {

    for (var prop in obj) {
      target.style[prop] = obj[prop];
    }
  }

  // prev,nextの疑似要素のスタイルを追加
  (function() {
    var tag = document.createElement('style');
    tag.type = 'text/css';
    var textNode = document.createTextNode('.prev::before, .prev::after, .next::before, .next::after {content: ""; display: block; position: absolute; width: 40px; height: 10px; background: #eee; border-radius: 5px; } .prev::before {top: 9px; left: 0px; transform: rotate(-45deg); } .prev::after {top: 31px; left: 0px; transform: rotate(45deg); } .next::before {top: 9px; left: 0px; transform: rotate(45deg); } .next::after {top: 31px; left: 0px; transform: rotate(-45deg); }');
    tag.appendChild(textNode);
    document.getElementsByTagName('head').item(0).appendChild(tag);
  })();

  function modal_window() {



    // モーダルウィンドウで表示したいリストのid,class名
    var target_list = '.js_light_box';

    // モーダルウィンドウが必要ない時はここで処理を終了する
    if (!$(target_list).get(0)) {
      return false;
    }


    // モーダルウィンドウのパーツを生成


    // モーダルウィンドウの背景
    var modal_background = document.createElement('div');
    var modal_background_style = {
      width: '100%',
      height: '100%',
      background: 'rgba(10,10,10,0.9)',
      position: 'fixed',
      top: '0',
      left: '0',
      display: 'none',
      zIndex: '11',
    };
    modal_background.setAttribute('class','modal_background');
    css_changer(modal_background,modal_background_style);
    document.body.appendChild(modal_background);

    // モーダルウィンドウで表示するもの
    var modal_container = document.createElement('div');
    var modal_container_style = {
      userSelect: 'none',
      maxWidth: '460px',
      width: '100%',
      position: 'absolute',
      top: '50%',
      left: '50%',
      transform: 'translate(-50%,-50%)',
    };
    modal_container.setAttribute('class','modal_container');
    css_changer(modal_container,modal_container_style);

    var modal_img = document.createElement('img');
    modal_img.setAttribute('class','modal_img');

    var modal_text = document.createElement('p');
    var modal_text_style = {
        fontFamily: '"ヒラギノ明朝 ProN W6", "HiraMinProN-W6", "HG明朝E", "ＭＳ Ｐ明朝","游ゴシック","ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro","メイリオ",Meiryo,"ＭＳ Ｐゴシック",sans-serif',
        color: '#ccc',
        fontSize: '16px',
        margin: 0,
    }
    modal_text.setAttribute('class','modal_text');
    css_changer(modal_text,modal_text_style);

    modal_container.appendChild(modal_img);
    modal_container.appendChild(modal_text);
    document.getElementsByClassName('modal_background')[0].appendChild(modal_container);

    // prevボタン
    var prev_button = document.createElement('div');
    var prev_button_style = {
      display: 'block',
      position: 'absolute',
      width: '40px',
      height: '50px',
      top: '50%',
      zIndex: '100',
      left: '20%',
      transform: 'translate(-50%,-50%)',
      cursor: 'pointer',
    };
    prev_button.setAttribute('class','prev');
    css_changer(prev_button, prev_button_style);
    document.getElementsByClassName('modal_background')[0].appendChild(prev_button);

    // nextボタン
    var next_button = document.createElement('div');
    var next_button_style = {
      display: 'block',
      position: 'absolute',
      width: '40px',
      height: '50px',
      top: '50%',
      zIndex: '100',
      right: '20%',
      transform: 'translate(50%,-50%)',
      cursor: 'pointer',
    };
    next_button.setAttribute('class','next');
    css_changer(next_button, next_button_style);
    document.getElementsByClassName('modal_background')[0].appendChild(next_button);

    /*変数宣言*/
    var modal_obj = $('.modal_img');
    var modal_text = $('.modal_text');
    var modal_back_obj = $('.modal_background');
    var prev_btn = $('.prev');
    var next_btn = $('.next');
    var $lightObj = $('.js_light_box');

    // 表示するリストのnodelist -> ulの中のli達
    var list_obj = $(target_list).children();
    // listの長さ
    var list_length = list_obj.length;
    // 列数
    var LINENUM = 3;
    var mod = list_length % LINENUM;

    // index いま表示されている要素のインデックス
    var index;


    if (mod !== 0) {
      for (var k = LINENUM; k > mod; k--) {
        $lightObj.append('<li class="empty_list"><div class="empty_box"></div></li>');
      }
    }

    // 全てのリストの中身にクリックイベントを付与するためのループ
    for (var i = 0; i < list_length; i++) {


      // イベント付与
      list_obj.eq(i).on('click', function(e){

        // indexを設定
        index = $(this).index();

        // PCのサイズではnext,prevボタン表示スマホサイズでは非表示
        if (window.innerWidth >= 767) {
          next_btn.css('display', 'block');
          prev_btn.css('display', 'block');
        } else {
          next_btn.css('display', 'none');
          prev_btn.css('display', 'none');
        }


        // next,prevの初期設定
        if (index == 0) {
          prev_btn.css('display', 'none');
        } else if(index == (list_length - 3)) {
          next_btn.css('display', 'none');
        }

        // 表示先を取得
        var src = $(this).find('img').attr('src');
        var text = $(this).find('img').attr('data_detail');
        // モーダルウィンドウを表示する
        modal_obj.attr('src', src);
        modal_text.html(text);
        // モーダルウィンドウの背景を表示する
        $('.modal_background').css('display', 'block');


      });/*event end*/



    }/* for end*/


    /*
      next,prevボタンのイベント設定
    */

    prev_btn.on('click', function(e) {

      modal_obj.attr('src',list_obj.eq(index - 1).find('img').attr('src'));
      modal_text.html(list_obj.eq(index - 1).find('img').attr('data_detail'));

      if (index == 1) {
        prev_btn.css('display', 'none');
      } else if(index == (list_length - 3)) {
        next_btn.css('display', 'block');
      }

      index--;
      e.stopPropagation();

    });/*event end*/

      next_btn.on('click', function(e) {

      modal_obj.attr('src',list_obj.eq(index + 1).find('img').attr('src'));
      modal_text.html(list_obj.eq(index + 1).find('img').attr('data_detail'));

      if (index == 0) {
        prev_btn.css('display', 'block');
      } else if(index == (list_length - 4)) {
        next_btn.css('display', 'none');
      }

      index++;
      e.stopPropagation();

    });/*event end*/

    modal_obj.on('click', function(e) {
      e.stopPropagation();
    });/*event end*/

    $(window).on('resize',function() {
        if (window.innerWidth >= 870) {
          if (index > 0) {
            prev_btn.css('display', 'block');
          }
          if (!(index == list_length - 3)){
            next_btn.css('display', 'block');
          }
        } else {
          next_btn.css('display', 'none');
          prev_btn.css('display', 'none');
        }
    });


    /*
      モーダルウィンドウの背景のクリックイベント
    */
    modal_back_obj.on('click', function() {
      // モーダルウィンドの中身を表示しないようにする
      modal_obj.attr('src','');
    // アニメーション終了後それぞれのdisplayをnoneへ
      modal_back_obj.css('display', 'none');
    });

  }// modal_window end
  modal_window();
});

