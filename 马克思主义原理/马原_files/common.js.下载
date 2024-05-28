// 用于一些公共方法，变量

// 美化滚动条的设置参数
var customScroll = {
    cursorborder: "",
    cursorwidth: 8,
    cursorcolor: "#CAD5E6",
    boxzoom: false,
    autohidemode: true,
    railpadding: {top: 0, right: 2, left: 0, bottom: 0}
};

$.loading = {
    start: function () {
        var html = "<div class=\"pop-loading\">\n" +
            "    <img class=\"img-loading\" src=\"../../images/common/loading.gif\" alt=\"\">\n" +
            "</div>";
        $('body').append(html);
        $('body').addClass('popOverflow');
    },
    end: function () {
        $('.pop-loading').remove();
        $('body').removeClass('popOverflow');
    }
}


//禁止滚动条滚动
function unScroll() {
    $('body').addClass('popOverflow');
    // var top = $(document).scrollTop();
    // $(document).on('scroll.unable', function (e) {
    //     $(document).scrollTop(top);
    // })
}

//移除禁止
function removeUnScroll() {
    // $(document).unbind("scroll.unable");
    $('body').removeClass('popOverflow');
}


// 关闭弹框
function closePop() {
    $(".popClose,.closePop").on("click", function () {
        // 排除掉某些离开需要提示的关闭
        if (!$(this).parents(".popDiv").hasClass("custom-close")) {
            $(this).parents(".maskDiv").fadeOut();
            removeUnScroll();
        }
    })
}

//显示弹框
function showPop(node) {
    $(node).fadeIn();
    unScroll();
}

//关闭弹框2
function closePop2(node) {
    $(node).fadeOut();
    removeUnScroll();
}

//tab切换
function initTab(parent, changeBack, x) {
    var _index = x || 1;
    $(parent).find('.tab-head .tab-t').removeClass('current');
    $(parent).find('.tab-head .tab-t').eq(_index - 1).addClass('current');
    $(parent).find('.tab-list').hide();
    $(parent).find('.tab-list').eq(_index - 1).show();

    $(parent).on('click', '.tab-head .tab-t', function () {
        $(this).siblings().removeClass('current');
        $(this).addClass('current');
        $(parent).find('.tab-list').hide();
        var index = $(this).index();
        $(parent).find('.tab-list').eq(index).show();
        if (changeBack) {
            changeBack();
        }
    })

}

// 点击弹框区域外，关闭弹框
function clickBesideClose(triggerObj, popObj) {
    $(document).on("click", function (event) {
        if (triggerObj[0] && !triggerObj[0].contains(event.target)) {
            popObj.slideUp();
        }
    })
}

// 设置main的最小高度
function setMainHeight(options) {
    var defaults = {
        target: $(".main"),
        height: 112 // 112为main上下的margin的高度
    };
    var sets = $.extend(defaults, options || {});
    var windowH = $(window).height();
    var height = windowH - sets.height;
    sets.target.css("min-height", height);

    // 窗口resize,内容高度优化
    $(window).resize(function () {
        setTimeout(function () {
            windowH = $(window).height();
            height = windowH - sets.height; // 112为main上下的margin的高度
            sets.target.css("min-height", height);
        }, 50);
    });
}

// 设置x 的最大高度
function setHeight(options) {
    var defaults = {
        type: 'height',
        target: $(".main"),
        height: 112 // 112为main上下的margin的高度
    };
    var sets = $.extend(defaults, options || {});
    var windowH = $(window).height();
    var height = windowH - sets.height;
    sets.target.css(sets.type, height);

    // 窗口resize,内容高度优化
    $(window).resize(function () {
        setTimeout(function () {
            windowH = $(window).height();
            height = windowH - sets.height; // 112为main上下的margin的高度
            sets.target.css(sets.type, height);
            sets.target.getNiceScroll().resize()
        }, 50);
    });
}

//查看大图
function initLookBigImg(box,touchObj,touchBox) {
    addBtnWrap();
    var imgObj;
    // 处理不是点击在图片上进行放大的情况
    if(touchObj){
        imgObj= touchObj;
    }else{
        imgObj= box + ' img'
    }
    $('body').on('click', imgObj , function () {
        var _index = touchObj? 0 : $(this).index();
        var boxObj=touchObj? touchBox:box;
        $(boxObj).viewer({
            navbar: false,
            url: 'data-original',
            title: false,
            toolbar: false,
            keyboard:false,
            inline:false
        });
        viewer = $(this).parents(boxObj).data('viewer');
        viewer.index = _index;
        viewer.show();
        $('.viewBtnWrap').fadeIn();
        unactiveViewBtn();
    })
    //    上一张
    $("#viewPrev").on("click", function () {
        viewer.prev();
        unactiveViewBtn()
    })
    //    下一张
    $("#viewNext").on("click", function () {
        viewer.next();
        unactiveViewBtn()
    })
    //    放大
    $("#viewZoomIn").on("click", function () {
        viewer.zoom(0.1);
    })
    // 缩小
    $("#viewZoomOut").on("click", function () {
        viewer.zoom(-0.1);
    })
    //    旋转
    $("#viewFlip").on("click", function () {
        viewer.rotate(-90);
    });
    //    关闭
    $("body").on("click",".viewer-container",function(){
        viewer.hide();
        $('.viewBtnWrap').fadeOut();
    });
    $("#viewClose").on("click", function () {
        viewer.hide();
        $('.viewBtnWrap').fadeOut();
    })
}

//最后一张图片右键头不可点，第一张图片左箭头不可点
function unactiveViewBtn() {
    $('#viewPrev').removeClass('unactive');
    $('#viewNext').removeClass('unactive');
    if (viewer.index == 0) {
        $('#viewPrev').addClass('unactive');
    } else if (viewer.index == (viewer.length - 1)) {
        $('#viewNext').addClass('unactive');
    }
}

function addBtnWrap() {
    var btnWrap = "<div class=\"viewBtnWrap\">\n" +
        "    <div id=\"viewPrev\"></div>\n" +
        "    <div id=\"viewNext\"></div>\n" +
        "    <div class=\"viewBtn\" id=\"viewZoomIn\"></div>\n" +
        "    <div class=\"viewBtn\" id=\"viewZoomOut\"></div>\n" +
        "    <div class=\"viewBtn\" id=\"viewFlip\"></div>\n" +
        "    <div class=\"viewSplit\"></div>\n" +
        "    <div class=\"viewBtn\" id=\"viewClose\"></div>\n" +
        "</div>";
    $('body').append(btnWrap);
}

//查看大图 end


// 设置toast的位置
function setDialogTop(popDiv){
    var dialogToastH=$("#dialogToast").height();
    var popH=popDiv.outerHeight();
    var top= popDiv.offset().top+popH*0.3-dialogToastH/2;
    $("#dialogToast").css({
        top: top+'px'
    })
}