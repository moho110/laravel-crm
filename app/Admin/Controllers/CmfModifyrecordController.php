<?php

namespace App\Admin\Controllers;

use App\Models\CmfModifyrecord;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfModifyrecordController extends AdminController {

	protected $title = "修改记录";

    public function index(Content $content)
    {
        return $content
            ->header('修改记录')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfModifyrecord());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('tablename', __('表名'));
                $grid->column('keyfield', __('字段'));
                $grid->column('keyvalue', __('键值'));
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfModifyrecord());
                $form->text('tablename', __('表名称'))
                ->creationRules('required|max:200|unique:cmf_modifyrecord',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('keyfield', __('字段'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('keyvalue', __('键值'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('modifycontent', __('修改内容'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required',['requied' => '此项不能为空']);
                $form->text('ip', __('IP地址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('修改记录');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('修改记录')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfModifyrecord());
        return $content
            ->header('修改记录')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfModifyrecord::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('tablename', __('表名'));
        $show->field('keyfield', __('字段'));
        $show->field('keyvalue', __('键值'));
        $show->field('createman', __('创建人'));
        $show->field('modifycontent', __('修改内容'));
        $show->field('createtime', __('创建时间'));
        $show->field('ip', __('IP地址'));
        return $show;
        }
}

?>