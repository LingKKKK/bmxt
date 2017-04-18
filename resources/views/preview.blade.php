<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/preview.css')}}"> 
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
</head>
<body>
<div id="info">
    <div class="top">
        <div class="inner">
            <div class="logo"></div>
            <ul class="nav">
                <a>开发版</a>
                <a>教育版</a>
                <a>社区</a>
                <a>帮助</a>
            </ul>
            <ul class="login">  
                <a class="active">免费注册</a>
                <a>登录</a>
            </ul>
        </div>  
    </div>

    <div class="preview_show">
        <div class="inner">
            <div class="preview_fl">
                <div class="video">
                    <div class="controller_video"></div>
                </div>
                <ul class="tabs_course">
                    <li v-on:click="tabindex = 0" v-bind:class="{active:tabindex == 0}">课程目录</li>
                    <li v-on:click="tabindex = 1" v-bind:class="{active:tabindex == 1}">课程咨询</li>
                    <li v-on:click="tabindex = 2" v-bind:class="{active:tabindex == 2}">课程评价</li>
                </ul>
                <div class="course_tabs" id="course_tabs">
                    <div class="kecheng" v-show="tabindex == 0">
                        <div class="course_catalogue" v-for="(item, index) in courseList">
                            <span class="chapter">@{{item.title}}</span>
                            <div class="chapter_sub">
                            	
	                                <span v-for="(i, vk) in item.subtitle" class="chapter_name active" v-bind:id="index+'_'+vk" @mouseover="hoverIndex = (index+'_'+vk)" v-on:mouseleave="hoverIndex = ''">
	                                	@{{i.subhead}}
		                                <span v-show="index+'_'+vk !== hoverIndex" class="time">@{{i.time}}</span>
		                                <span v-show="index+'_'+vk == hoverIndex" class="buy">购买@{{index+'_'+vk}}</span>
		                                <span v-show="index+'_'+vk == hoverIndex" class="login">购买2--@{{index+'_'+vk}}</span>
									</span>
                                
                            </div>
                        </div>
                    </div>
                    <div class="consulte" v-show="tabindex == 1"></div>
                    <div class="evaluate" v-show="tabindex == 2"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="preview_fr">
                <div class="preview_intro">
                    <ul class="tab_intro">
                        <li v-on:click="needRead = 0" v-bind:class="{active:needRead == 0}">简介</li>
                        <li v-on:click="needRead = 1" v-bind:class="{active:needRead == 1}">须知</li>
                    </ul>
                    <div class="div_intro" v-show="needRead == 0">
                        <p class="intro"><span>课程介绍：</span>@{{introList.intro}}</p>
                        <p class="price"><span>课程费用：</span><i>@{{introList.mark_price}}</i>@{{introList.price}}</p>
                        <p class="recommend"><span>推荐指数：</span>@{{introList.recommend}}</p>
                        <p class="tech_sup"><span v-for="(item, index) in introList.tech_sup">@{{item.company_name}}</span></p>
                    </div>
                    <div class="user_read" v-show="needRead == 1">
						<p class="title">课程须知</p>
						<span>@{{introList.course_notes.note}}</span>
                    </div>
                    <button class="preview_pay">@{{preview_pay}}</button>
                </div>
                <div class="recommend_preview">
                    <p>推荐课程</p>
                    <ul>
                        <li v-for="(item, index) in recommend">
                            <div class="img"></div>
                            <span class="name">@{{item.name}}</span>
                            <span class="num">@{{item.num}}</span>
                            <div class="clearfix"></div>
                        </li>

                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="bot">
        <div class="logo"></div>
        <span>© 2017 KenRobot  |  京 ICP备15039570号</span>
        <p>北京市海淀区天秀路10号中国农大国际创业园1号楼526</p>
    </div>
</div>

<script type="text/javascript" src="{{asset('assets/js/vue.js')}}"></script>
<script type="text/javascript">
    var cartList = new Vue({
        el: '#info',
        data: {
            courseList : [
                {
                    title: "第一章",
                    subtitle: [
                        {
                        	subhead: "1.1 arduino起源",
                        	time: '56:11',
                        },
                        {
                        	subhead: "1.1 arduino起源",
                        	time: '56:11',
                        },
                    ]
                },{
                    title: "第二章",
                    subtitle: [
                        {
                        	subhead: "1.1 arduino起源",
                        	time: '56:11',
                        },
                        {
                        	subhead: "1.1 arduino起源",
                        	time: '56:11',
                        },
                    ]
                },{
                    title: "第三章",
                    subtitle: [
                        {
                        	subhead: "1.1 arduino起源",
                        	time: '56:11',
                        },
                        {
                        	subhead: "1.1 arduino起源",
                        	time: '56:11',
                        },
                    ]
                },{
                    title: "第四章",
                    subtitle: [
                        {
                        	subhead: "1.1 arduino起源",
                        	time: '56:11',
                        },
                        {
                        	subhead: "1.1 arduino起源",
                        	time: '56:11',
                        },
                        {
                        	subhead: "1.1 arduino起源",
                        	time: '56:11',
                        },
                        {
                        	subhead: "1.1 arduino起源",
                        	time: '56:11',
                        },
                    ]
                }
            ],
            introList : {
            	intro: '在这个时代，数据越来越重要，数据=金钱，已经成为定理。本课程让你初步掌握使用Python进行数据采集，以及如何从TXT和PDF文档中读取数据，掌握本课程，创造属于你的价值。',
            	mark_price: ' 198 ',
            	price: '158 RMB',
            	recommend: '★★★★★',
            	tech_sup: [
            		{company_name: 'Scratch'},
            		{company_name: 'Arduino'},
            		{company_name: '啃萝卜'},
            	],
            	course_notes: {
            		note: '没有基础的同学建议先学习前置课程小时学习SpringBoot》http://www.imooc.com/learn/767,代码示例请参考https://git.oschina.net/liaoshixiong/girl老师告诉你能学到什么？SpringBoot针对Web方面的相关技巧（1）SpringBoot针对Web方面的相关技巧（2）SpringBoot针对Web方面的相关技巧（3）SpringBoot针对Web方面的相关技巧（4）SpringBoot针对Web方面的相关技巧（5）SpringBoot针对Web方面的相关技巧（6）SpringBoot针对Web方面的相关技巧（7）SpringBoot针对Web方面的相关技巧（8）',
            	},
            },
            recommend: [
            	{
            		img_src: "",
            		name: 'SpringBoot进阶之Web进阶',
            		num: '初级 · 2487人在学',
            	},{
            		img_src: "",
            		name: 'SpringBoot进阶之Web进阶',
            		num: '初级 · 2487人在学'
            	},{
            		img_src: "",
            		name: 'SpringBoot进阶之Web进阶',
            		num: '初级 · 2487人在学'
            	},{
            		img_src: "",
            		name: 'SpringBoot进阶之Web进阶',
            		num: '初级 · 2487人在学'
            	}
            ],
            tabindex : 0,
            isActive : 0,
            needRead: 0,
            preview_pay: '购买课程',
            hoverIndex: '',
        },
        computed: {

        },
        methods: {
            chapternum_change: function (event) {
            },
            alert_this: function() {
            },
            handleClick(i, index, vk, event){
            	// event.target.innerHtml
            	// console.dir(this.courseList);
            },
            b() {
                console.log('b');
            }
        },
    })
</script>
</body>
</html>
