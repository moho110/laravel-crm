<?php

namespace App\Admin\Controllers;

use App\Models\CmfAccessbank;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfAccessbankController extends AdminController {

	protected $title = "帐号操作";

    public function index(Content $content)
    {
        return $content
            ->header('帐号操作')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfAccessbank());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('bankid', __('帐号ID'));
                $grid->column('oldjine', __('过往金额'));
                $grid->column('jine', __('金额'));
                $grid->column('opertype', __('操作类型'));
                $grid->column('guanlianbillid', '关联清单ID');                
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfAccessbank());
                $form->text('bankid', __('帐号ID'))
                ->creationRules('required|max:200|unique:cmf_accessbank',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->currency('oldjine', __('过往金额'))->symbol('￥')->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('jine', __('过往金额'))->symbol('￥')->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('opertype', __('操作类型'))->options(['1' => '是','0' => '否'])->rules('required');
                $form->text('guanlianbillid', __('关联清单ID'))
                ->creationRules('required|max:2|unique:cmf_accessbank',
                        ['required' => '此项不能为空','max' =>'不能大于2个字符','unique' => '数据已经存在']);
                $form->text('createman', __('创建人'))->creationRules('required', ['required' => '创建人不能为空']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('帐号操作');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('帐号操作')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfAccessbank());
        return $content
            ->header('帐号操作')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfAccessbank::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('bankid', __('帐户ID'));
        $show->field('oldjine', __('过往金额'));
        $show->field('jine', __('金额'));
        $show->field('opertype', __('操作类型'));
        $show->field('guanlianbillid', __('关联清单ID'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        return $show;
        }
}

?>