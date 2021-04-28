<?php

namespace App\Admin\Controllers;

use App\Models\CmfFeiyongclass;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfFeiyongclassController extends AdminController {

	protected $title = "费用分类";

    public function index(Content $content)
    {
        return $content
            ->header('费用分类')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfFeiyongclass());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('classname', __('类别名称'));
                $grid->column('kind', __('大类'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfFeiyongclass());
                $form->text('classname', __('分类名称'))
                ->creationRules('required|max:200|unique:cmf_feiyongclass',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('kind', __('种类'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('费用分类');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('费用分类')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfFeiyongclass());
        return $content
            ->header('费用分类')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfFeiyongclass::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('classname', __('分类名称'));
        $show->field('kind', __('种类'));
        return $show;
        }
}

?>