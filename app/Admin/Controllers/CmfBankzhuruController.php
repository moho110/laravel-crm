<?php

namespace App\Admin\Controllers;

use App\Models\CmfBankzhuru;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfBankzhuruController extends AdminController {

	protected $title = "帐户注入";

    public function index(Content $content)
    {
        return $content
            ->header('帐户注入')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfBankzhuru());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('accountid', __('帐户编号'));
                $grid->column('jine', __('金额'));
                $grid->column('userid', __('用户ID'));
                $grid->column('opertime', __('操作时间'));
                $grid->column('inouttype', '输入输出类型');

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfBankzhuru());
                $form->text('accountid', __('帐户ID'))
                ->creationRules('required|max:200|unique:cmf_bankzhuru',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->currency('jine', __('金额'))->symbol('rmb')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('userid', __('用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('opertime', __('操作时间'))
                ->creationRules('required',['required' => '此项不能为空']);
                $form->radio('inouttype', __('输入输出类型'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->textarea('memo', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('帐户注入');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('帐户注入')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfBankzhuru());
        return $content
            ->header('帐户注入')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfBankzhuru::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('accountid', __('帐户ID'));
        $show->field('jine', __('金额'));
        $show->field('userid', __('用户ID'));
        $show->field('opertime', __('操作时间'));
        $show->field('inouttype', __('输入输出类型'));
        $show->field('memo', __('备注'));
        return $show;
        }
}

?>