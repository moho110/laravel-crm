<?php

namespace App\Admin\Controllers;

use App\Models\CmfSystemprivate;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSystemprivateController extends AdminController {

	protected $title = "系统隐私";

    public function index(Content $content)
    {
        return $content
            ->header('系统隐私')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSystemprivate());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('NAME', __('名称'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSystemprivate());
                $form->text('NAME', __('名称'))
                ->creationRules('required|max:200|unique:cmf_systemprivate',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('CONTENT', __('内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('系统隐私');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('系统隐私')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSystemprivate());
        return $content
            ->header('系统隐私')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSystemprivate::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('NAME', __('名称'));
        $show->field('CONTENT', __('内容'));
        return $show;
        }
}

?>