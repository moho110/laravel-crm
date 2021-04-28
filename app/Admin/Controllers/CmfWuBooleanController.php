<?php

namespace App\Admin\Controllers;

use App\Models\CmfWuBoolean;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfWuBooleanController extends AdminController {

	protected $title = "是否选项";

    public function index(Content $content)
    {
        return $content
            ->header('是否选项')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfWuBoolean());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('yesorno', '是否')
                    ->display(function ($yesorno) {
                        return $yesorno ? '是' : '否';
                    });
                
                $grid->column('creator', __('创建人'));
                $grid->column('createTime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfWuBoolean());
                $form->text('yesorno', __('是否'))
                ->creationRules('required|max:200|unique:cmf_wu_boolean',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('creator', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createTime', __('创建时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('是否选项');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('是否选项')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfWuBoolean());
        return $content
            ->header('是否选项')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfWuBoolean::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('yesorno', __('是否'));
        $show->field('memo', __('备注'));
        $show->field('creator', __('创建人'));
        $show->field('createTime', __('创建时间'));
        return $show;
        }
}

?>