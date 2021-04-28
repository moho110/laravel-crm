<?php

namespace App\Admin\Controllers;

use App\Models\CmfFeiyongrecord;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfFeiyongrecordController extends AdminController {

	protected $title = "费用记录";

    public function index(Content $content)
    {
        return $content
            ->header('费用记录')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfFeiyongrecord());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('typeid', __('类型ID'));
                $grid->column('jine', __('金额'));
                $grid->column('accountid', __('帐户ID'));
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', '创建时间');
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfFeiyongrecord());
                $form->number('typeid', __('类型ID'))
                ->creationRules('required|max:200|unique:cmf_feiyongrecord',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->currency('jine', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('kind', __('种类'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->number('accountid', __('帐户ID'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('chanshengdate', __('产生日期'))
                ->creationRules('required',
                        ['requied' => '此项不能为空','max' =>'不能大于2个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['requied' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('费用记录');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('费用记录')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfFeiyongrecord());
        return $content
            ->header('费用记录')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfFeiyongrecord::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('typeid', __('类型ID'));
        $show->field('jine', __('金额'));
        $show->field('kind', __('种类'));
        $show->field('accountid', __('帐户ID'));
        $show->field('chanshengdate', __('产生日期'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('beizhu', __('备注'));
        return $show;
        }
}

?>