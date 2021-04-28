<?php

namespace App\Admin\Controllers;

use App\Models\CmfSystemLogall;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSystemLogallController extends AdminController {

	protected $title = "系统日志";

    public function index(Content $content)
    {
        return $content
            ->header('系统日志')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSystemLogall());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('currentTime', __('当前时间'));
                $grid->column('executeTime', __('执行时间'));
                $grid->column('SQL', __('SQL语句'));
                $grid->column('Threads_cached', __('线程缓存'));
                $grid->column('Threads_running', '线程运行');
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSystemLogall());
                $form->datetime('currentTime', __('当前时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->text('executeTime', __('执行时间'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('SQL', __('SQL语句'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('Slow_launch_threads', __('是否已慢运行线程'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('Threads_cached', __('线程是否已缓存'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('Threads_connected', __('线程是否已连接'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('Threads_created', __('线程是否已创建'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('Threads_running', __('线程是否正在运行'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('Qcache_free_blocks', __('缓存是否空块'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('Qcache_free_memory', __('缓存是否空闲内存'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('Qcache_hits', __('缓存次数'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('Qcache_inserts', __('是否插入缓存'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('Qcache_lowmem_prunes', __('是否低内存缓存'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('Qcache_not_cached', __('是否非缓存'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->radio('Qcache_queries_in_cache', __('是否缓存查询'))
                ->rules('required');
                $form->text('Qcache_total_blocks', __('缓存总数'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('系统日志');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('系统日志')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSystemLogall());
        return $content
            ->header('系统日志')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSystemLogall::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('currentTime', __('当前时间'));
        $show->field('executeTime', __('执行时间'));
        $show->field('SQL', __('SQL语句'));
        $show->field('Slow_launch_threads', __('是否已慢运行线程'));
        $show->field('Threads_cached', __('线程是否已缓存'));
        $show->field('Threads_connected', __('线程是否已连接'));
        $show->field('Threads_created', __('线程是否已创建'));
        $show->field('Threads_running', __('线程是否正在运行'));
        $show->field('Qcache_free_blocks', __('缓存是否空块'));
        $show->field('Qcache_free_memory', __('缓存是否空闲内存'));
        $show->field('Qcache_hits', __('缓存次数'));
        $show->field('Qcache_inserts', __('是否插入缓存'));
        $show->field('Qcache_lowmem_prunes', __('是否低内存缓存'));
        $show->field('Qcache_not_cached', __('是否滚动显示'));
        $show->field('Qcache_queries_in_cache', __('是否非缓存'));
        $show->field('Qcache_total_blocks', __('缓存总数'));
        return $show;
        }
}

?>