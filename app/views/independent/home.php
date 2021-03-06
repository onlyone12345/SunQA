<title>Welcome to <?php echo $this->config->item('web_name'); ?></title>
</head>
<body>
<?php $this->load->view('must/menu'); ?>
    <div class="page-content">
        <div class="bg-lightBlue fg-white align-center">
            <div class="container">
                <div class="no-overflow land-bar">
                    <div class="padding10 sub-leader text-light">
                        <?php echo $this->lang->line('welcome') ?>
                    </div>
                    <h1 class="text-shadow metro-title text-light land-bar-title"><?php echo $this->config->item('web_name') ?></h1>
                    <p class="padding10 land-bar-description">
                        <?php echo $this->config->item('description_home') ?>
                    </p>
                    <div class="margin50">
                        <div class="clear-float">
                            <a href="<?php echo base_url('create'); ?>"><button class="button big-button block-shadow success"><span class="mif-question mif-ani-shuttle"></span> Getting Started Question</button></a>
                        </div>
                    </div>
                    <div class="grid no-margin-bottom" id="g1">
                        <div class="row cells3">
                            <div class="cell no-overflow" style="height: 85px">
                                <div class="bg-yellow fg-white block-shadow" style="height: 85px; padding-top: 20px; margin-top: 85px;">
                                    <h2 class="text-light">simple question</h2>
                                </div>
                            </div>
                            <div class="cell no-overflow" style="height: 85px">
                                <div class="bg-green fg-white block-shadow" style="height: 85px; padding-top: 20px; margin-top: 85px;">
                                    <h2 class="text-light">quick response</h2>
                                </div>
                            </div>
                            <div class="cell no-overflow" style="height: 85px">
                                <div class="bg-red fg-white block-shadow" style="height: 85px; padding-top: 20px; margin-top: 85px;">
                                    <h2 class="text-light">awesome answer</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(function(){
                            setTimeout(function(){
                                $("#g1 .cell > div:eq(0)").animate({
                                    'margin-top': 0
                                }, 500, 'easeOutBounce');
                                $("#g1 .cell > div:eq(1)").animate({
                                    'margin-top': 0
                                }, 1000, 'easeOutBounce');
                                $("#g1 .cell > div:eq(2)").animate({
                                    'margin-top': 0
                                }, 1500, 'easeOutBounce');
                            }, 500);
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="fg-dark">
            <div class="container">
                <div style="padding-top: 40px; padding-bottom: 10px;">
                    <div class="grid">
                        <div class="row cells3">
                            <div class="cell no-phone">
                                <div class="image-container bordered">
                                    <div class="frame">
                                        <img src="<?php echo assets_img('QAicon.png'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="cell colspan2" style="padding-left: 20px">
                                <h1 class="">Whats is <?php echo $this->config->item('web_name'); ?></h1>
                                <ol class="numeric-list square-marker">
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</li>
                                    <li>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</li>
                                    <li>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</li>
                                    <li>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</li>
                                    <li>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</li>
                                    <li>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
                                </ol>
                                <p class="no-display">
                                The main feature in version 3 is: a declarative approach to the definition and initialization of components, and the framework itself monitors components, pressure via ajax. When a declarative definition of all component parameters are set via data-* attributes, including methods and events of the component. This approach allows to further separate html and javascript code. Now that would determine which component do not need to know javascript :). It is still possible to determine which component directly via javascript.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($latest_question)): ?>
                <div class="latest-question">
                    <h2>Latest Questions</h2>
                    <hr class="thin">
                    <?php foreach ($latest_question as $lq): ?>
                    <section class="QuestionList">
                        <header class="QuestionList-header">
                            <img class="QuestionList-avatar" alt="" height="48" width="48" src="<?php echo pic_user($lq->image) ?>">
                            <h3 class="QuestionList-title">
                            <?php if (!empty($lq->answer_id)): ?>
                                <button class="cycle-button success" style="margin-right: 10px;" data-role="hint" data-hint-mode="2" data-hint="Answered|" data-hint-position="top"><span class="mif-checkmark"></span></button>
                            <?php endif ?>
                            <a href="<?php echo base_url('question/' . $lq->url_question) ?>"><?php echo $lq->subject ?></a></h3>
                            <p class="QuestionList-meta">
                                By <a class="QuestionList-author" href="<?php echo base_url('user/' . $lq->username); ?>"><?php echo $lq->nama ?></a> under <a class="QuestionList-category QuestionList-category-js" href="<?php echo base_url('category/'. uri_encode($lq->category_name)) ?>"><?php echo $lq->category_name ?></a> <?php echo dateHourIcon($lq->question_date) ?> <span class="mif-bubble icon"></span> <?php echo $this->qa_model->count_where('answer', array('question_id' => $lq->id_question)) ?> Answers
                            </p>
                        </header>
                        <div class="QuestionList-description">
                            <p>
                                <?php echo qa_remove_html_limit($lq->description_question, 100) ?>
                            </p>
                        </div>
                        <div class="fl">
                            <span class="mif-tags"></span>
                            <?php foreach ($question_tag as $qt): ?>
                                <?php if ($qt->question_id === $lq->id_question): ?>
                                    <a href="<?php echo base_url('tag/' . uri_encode($qt->tag_name)); ?>"><span class="tag success"><?php echo $qt->tag_name ?></span></a>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </section>
                    <?php endforeach ?>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>