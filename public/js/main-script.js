$(document).ready(function(){
			// menu effection
			$("#main-menu li").children("ul").hide();
			$("#main-menu li li").has("ul").children("a").append('<span class="expand_marker">+</span>');
			$("#main-menu li").mouseenter(function(){
				$(this).children("a").addClass('expand');
				$(this).children("a").children(".expand_marker").text("-");
				$(this).children("ul").fadeIn(500);
			}).mouseleave(function(){
				$(this).children("a").removeClass('expand');
				$(this).children("a").children(".expand_marker").text("+");
			 	$(this).children("ul").hide();
			});
			
			// Image zoom handle
			$(".imagezoom").imagezoomsl({
				descarea: ".zoomarea", 
				zoomrange:[3, 10],
				magnifiersize:[344, 344],
				scrollspeedanimate:10,
				magnifierborder: 'none'
			});
			
			$(".thumb").click(function(){
				var that = this;
				$(".imagezoom").fadeOut(600,function(){
					$(this).attr("src",$(that).attr("src"))
								.attr("data-large", $(that).attr("data-large"))
								.fadeIn(1000);
				});
			});
			
			// Image thumbs gallery
			$(".jCarouselLite").jCarouselLite({
				btnNext: ".gallery-thumbs .scroll_right",
				btnPrev: ".gallery-thumbs .scroll_left",
				visible: 4,
				circular: false
			});
			
			$('.quantity-container .up').click(function () {
				var p_quantity = $(this).parent().parent().parent().children('.p-quantity');
				var value = $(p_quantity).val();
				$(p_quantity).val(parseInt(value) + 1);
			});
			
			//quantity increase/descrease
			$('.quantity-container .down').click(function () {
				var p_quantity = $(this).parent().parent().parent().children('.p-quantity');
				var value = $(p_quantity).val();
				if(parseInt(value) > 1)
					$(p_quantity).val(value - 1);
			})
			
			$('.justview  .scroll_list').jCarouselLite({
				btnNext: ".justview .scroll_right",
				btnPrev: ".justview .scroll_left",
				visible: 5,
				scroll: 5,
				circular: false
			});
			
			// prepend item into cart
			$('.btn-add-to-cart').click(function(){
				var p_id = "p_121";
				var p_qty = parseInt($('.p-quantity').attr('value'));
				if(isNaN(p_qty)) return;
				var isExist = false;
				
				var yes = confirm('Do you want to add '+ p_qty +' item(s) into cart ?');
				if(!yes) return;
				
				if($('#'+p_id).length > 0){
					var n = parseInt($('#'+p_id).children('.qty').children('b').text());
					if(isNaN(n)) return;
					p_qty += n;
					isExist = true;
				}
				
				var html ='<li class="item" id="'+p_id+'">'
							+'<a class="illus" href="">'
							+'<img src="../img/no.jpg"/>'
							+'</a>'
							+'<a class="name" href="">Acd xyz</a>'
							+'<p class="price current-price">160.000 d</p>'
							+'<p class="price old-price">190.000 d</p>'
							+'<p class="qty">x<b>'+ p_qty +'</b></p>'
							+'</li>';
				
				if(isExist) 
				{
					$('#'+p_id).remove();
					$(html).hide().prependTo('.cart-preview ul').fadeIn('slow');
				}
				else
					$(html).hide().prependTo('.cart-preview ul').slideDown('slow');
				
			});
			
		});