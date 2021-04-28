<?php

namespace App\Admin\Controllers;

use App\Models\CmfDictSatisfaction;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfDictSatisfactionController extends AdminController {

	protected $title = "满意度";

    public function index(Content $content)
    {
        return $content
            ->header('满意度')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfDictSatisfaction());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('PY_Code', __('支付代码'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfDictSatisfaction());
                $form->text('Satisfaction', __('满意度'))
                ->creationRules('required|max:200|unique:cmf_dict_satisfaction',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('PY_Code', __('支付代码'))
                ->creationRules('required|max:200|unique:cmf_dict_satisfaction',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('满意度');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('满意度')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfDictSatisfaction());
        return $content
            ->header('满意度')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfDictSatisfaction::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('Satisfaction', __('满意度'));
        $show->field('PY_Code', __('支付代码'));
        return $show;
        }
}

?>