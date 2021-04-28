<?php

namespace App\Admin\Controllers;

use App\Models\CmfSysCode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfSysCodeController extends AdminController {

	protected $title = "系统代码";

    public function index(Content $content)
    {
        return $content
            ->header('系统代码')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfSysCode());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('CODE_NO', __('代码编号'));
                $grid->column('CODE_NAME', __('代码名称'));
                $grid->column('CODE_FLAG', __('代码标识'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfSysCode());
                $form->text('CODE_NO', __('代码编号'))
                ->creationRules('required|max:200|unique:cmf_sys_code',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('CODE_NAME', __('代码名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('CODE_ORDER', __('代码排序'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('PARENT_NO', __('父级编号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('CODE_FLAG', __('代码标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('系统代码');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('系统代码')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfSysCode());
        return $content
            ->header('系统代码')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfSysCode::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('CODE_NO', __('代码编号'));
        $show->field('CODE_NAME', __('代码名称'));
        $show->field('CODE_ORDER', __('代码排序'));
        $show->field('PARENT_NO', __('父级编号'));
        $show->field('CODE_FLAG', __('代码标识'));
        return $show;
        }
}

?>