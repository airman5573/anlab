
gsap.registerPlugin(ScrollTrigger, ScrollToPlugin, SplitText);



function toggleText(){
    if (!document.querySelector('.toggle-text')) {
        return;
	}

	let textIn = document.querySelector('.text-in')
	let textOut = document.querySelector('.text-out')
	
	let splitTextIn = new SplitText(textIn,{type:"chars"});
	let splitTextOut = new SplitText(textOut,{type:"chars"});

	let tl = gsap.timeline({repeat:-1})
		.from(splitTextIn.chars,{opacity:0, stagger:0.03, y:+10})
		.to(splitTextIn.chars,{opacity:0, stagger:0.03, y:+10},'+=3')
		.from(splitTextOut.chars,{opacity:0, stagger:0.03, y:+10},'-=0.5')
		.to(splitTextOut.chars,{opacity:0, stagger:0.03, y:+10},'+=3')
	tl.delay(2)
	return tl
}


function bgImgScale(){
	if (!document.querySelector('.bg__scale')) {
		return;
	}
	let bgImg = document.querySelector('.bg__scale img')
	gsap.timeline({repeat:-1})
		.to(bgImg,{scaleX:1.1, scaleY:1.3,duration:15})
		.to(bgImg,{scaleX:1.1, scaleY:1.0,duration:15})
}




function chartFund(){
	if (!document.querySelector('#fund--chart')) {
		return;
	}

	var ctx = document.getElementById('fund--chart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['2012', '2013', '2014', '2015', '2016', '2017', '2020'],
			datasets: [{
				label: 'KRW 100mn of Accumulative AUM',
				data: [5000, 5630, 6260, 6915, 7218, 10688, 12872],
				backgroundColor: [
					'rgba(13,51,93, 0.1)',
					'rgba(13,51,93, 0.2)',
					'rgba(13,51,93, 0.3)',
					'rgba(13,51,93, 0.4)',
					'rgba(13,51,93, 0.5)',
					'rgba(13,51,93, 0.6)',
					'rgba(13,51,93, 0.9)',
				],
				borderColor: [
					'rgba(0,0,0, 0.2)',
					'rgba(0,0,0, 0.2)',
					'rgba(0,0,0, 0.2)',
					'rgba(0,0,0, 0.2)',
					'rgba(0,0,0, 0.2)',
					'rgba(0,0,0, 0.2)',
					'rgba(0,0,0, 0.2)',
				],
				borderWidth: 1
			}]
		},
		options: {
			legend:{
				display:false,



			},
			scales: {
				xAxes:[{
					gridLines: {
						display: true,
						drawBorder: true,
						drawOnChartArea: false,
						drawTicks: false,
					}
				}],
				yAxes: [{
					gridLines: {
						display: false,
						drawBorder: false,
						drawOnChartArea: false,
						drawTicks: false,
					},
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});

}
function parallaxFrame(){
	if (!document.querySelector('.parallax-frame')) {
        return;
    }	

	let frames = document.querySelectorAll('.parallax-frame');
	frames.forEach(frame =>{
		let image = frame.querySelector('img');
		let tl = gsap.timeline({
			scrollTrigger:{
				trigger:image,
				// markers:true,
				start : 'top bottom',
				scrub:true,
			}
		});
		tl
			.to(image,{yPercent:20, ease:Power4.inOut})
	})
}

function fadeItem(delayTime = 0.2){
	if (!document.querySelector('.fade-item')) {
        return;
    }
	let items= document.querySelectorAll('.fade-item');
	items.forEach(item =>{
		let tl = gsap.timeline({
			delay:delayTime,
			scrollTrigger:{
				trigger:item,
				// markers:true,
				start : 'top bottom',
			}
		});
		tl
			.fromTo(item,{autoAlpha:'0', y:'20'},{autoAlpha:'1', y:'0',duration:'0.5', ease:Power4.inOut})
			
	})
}

function countFund(){
	if (!document.querySelector('#counter')) {
		return;
	}
	let counter = document.querySelector('#counter');

	let tl = gsap.timeline({
		scrollTrigger:{
			trigger:counter,
			//markers:true,
			onEnter : self => {
				$('#counter').countUp();
			}
		}
	})
	// 
}

function toggleTeam() {

	let navItems = document.querySelectorAll('.team-list .nav-item');
	let contents = document.querySelectorAll('.team-list .team-content');

	const handleClick = (e) => {

		e.preventDefault();
		let item = e.currentTarget;
		let targetLink = item.dataset.name;


		if(item.classList.contains('active')){
			item.classList.remove('active')
			contents.forEach(node => {
				node.classList.remove('active')
			})
		}else{

				navItems.forEach(node => {
					node.classList.remove('active')
				})
	
				item.classList.add('active')
				
				contents.forEach(node => {
					node.classList.remove('active')
				})	


			setTimeout(
				function(){
					let target = document.querySelector(targetLink)
					target.classList.add('active')
				},500
			)

			
	
		}
	}
	navItems.forEach((item)=>{
		item.addEventListener('click', handleClick)
	})
}


const updateBodyColor = function(bgColor, textColor){
	document.documentElement.style.setProperty('--bg-color', bgColor);
	document.documentElement.style.setProperty('--text-color', textColor);
}

