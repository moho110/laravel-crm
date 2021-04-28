<?php

namespace App\Admin\Controllers;

use App\Models\CmfAccesstype;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfAccesstypeController extends AdminController {

	protected $title = "帐户操作类型";

    public function index(Content $content)
    {
        return $content
            ->header('帐户操作类型')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfAccesstype());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('name', __('名称'));
                $grid->column('parent', __('父级'));
                $grid->column('inout', __('输入输出'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfAccesstype());
                $form->text('name', __('名称'))
                ->creationRules('required|max:200|unique:cmf_accesstype',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('parent', __('父级'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('inout', __('输入输出'))->options(['1' => '输入','0' => '输出'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('帐户操作类型');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('帐户操作类型')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfAccesstype());
        return $content
            ->header('帐户操作类型')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfAccesstype::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('name', __('名称'));
        $show->field('parent', __('父级'));
        $show->field('inout', __('输入输出'));
        return $show;
        }
}

?>