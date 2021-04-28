<?php

namespace App\Admin\Controllers;

use App\Models\CmfSystemconfig;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSystemconfigController extends AdminController {

	protected $title = "系统配置";

    public function index(Content $content)
    {
        return $content
            ->header('系统配置')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSystemconfig());
                $grid->column('id', __('模块'))->sortable();
                $grid->column('UNIT', __('单元'));
                $grid->column('STATUS', __('状态'));
                $grid->column('SHORTCODE', __('短码'));
                $grid->column('TRANSCODE', __('翻码'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSystemconfig());
                $form->text('UNIT', __('单元'))
                ->creationRules('required|max:200|unique:cmf_systemconfig',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('STATUS', __('状态'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('MEMO', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('SHORTCODE', __('短码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('TRANSCODE', __('翻码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->textarea('CONTENT', __('内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('系统配置');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('系统配置')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSystemconfig());
        return $content
            ->header('系统配置')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSystemconfig::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('CONTENT', __('内容'));
        $show->field('UNIT', __('单元'));
        $show->field('STATUS', __('状态'));
        $show->field('MEMO', __('备注'));
        $show->field('SHORTCODE', __('短码'));
        $show->field('TRANSCODE', __('翻码'));
        return $show;
        }
}

?>