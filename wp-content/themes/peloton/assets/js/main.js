/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/************************************
For adding Class on Header Scroll
************************************/
function init() {
	window.addEventListener('scroll', function(e) {
		var distanceY = window.pageYOffset || document.documentElement.scrollTop,
			shrinkOn = 50,
			header = document.querySelector("header");
		if (distanceY > shrinkOn) {
			classie.add(header, "smaller");
		} else {
			if (classie.has(header, "smaller")) {
				classie.remove(header, "smaller");
			}
		}
	});
}
window.onload = init();

//------------------------EQUAL HEIGHT FOR BLOCKS----------------------------

equalheight = function(container) {

	var currentTallest = 0,
		currentRowStart = 0,
		rowDivs = new Array(),
		$el,
		topPosition = 0;
	$(container).each(function() {

		$el = $(this);
		$($el).height('auto')
		topPostion = $el.position().top;

		if (currentRowStart != topPostion) {
			for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
			rowDivs.length = 0; // empty the array
			currentRowStart = topPostion;
			currentTallest = $el.height();
			rowDivs.push($el);
		} else {
			rowDivs.push($el);
			currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
		}
		for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
			rowDivs[currentDiv].height(currentTallest);
		}
	});
}
$(window).load(function() {
	equalheight('.coTrans, #myTabs li');
});


$(window).resize(function() {
	equalheight('.coTrans, #myTabs li');
});


//----------------For Tabs------------------
$('#myTab a', '#myTab a').click(function(e) {
	e.preventDefault();
	$(this).tab('show');
});

$('#moreTabs a').click(function(e) {
	e.preventDefault();
	$(this).tab('show');
});

//----------------Responsive Menu------------------
function mobMenuHt() {
	var winHt = $(window).height();
	var itemWrap = $('.cbp-spmenu .navbar-nav');
	var menuHeader = $('.menu-header');
	var menuHeaderHt = $(menuHeader).innerHeight();
	$(itemWrap).height(winHt - menuHeaderHt + 1);
}

function subMenuClick() {
	var triggerBtn = $('.menu-parent');
	$(triggerBtn).click(function() {
		var target, activeClass
		target = $(this).find('ul');
		activeClass = 'active';
		if ($(this).hasClass(activeClass)) {
			$(target).slideUp();
			$(this).removeClass(activeClass);
		} else {
			$(target).slideDown();
			$(this).addClass(activeClass);
		}
	})
}
$('.menu-header').click(function() {
	$('.toogle-menu').trigger('click')
})
mobMenuHt()
subMenuClick();
$(window).resize(function() {
	mobMenuHt()
})
window.onload = init();

var

	menuRight = document.getElementById('cbp-spmenu-s2'),
	body = document.body;

showRightPush.onclick = function() {

	// classie.toggle(menuRight, 'right-side-nav');
	classie.toggle(menuRight, 'right-side-nav-show');
	$(this).toggle();
	// menuRight.animate({width: 'show'});
	//disableOther('showRightPush');
};