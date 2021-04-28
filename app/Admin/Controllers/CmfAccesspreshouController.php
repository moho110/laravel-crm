<?php

namespace App\Admin\Controllers;

use App\Models\CmfAccesspreshou;
use App\Models\CmfCustomer;
use App\Models\CmfDepartment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfAccesspreshouController extends AdminController {

	protected $title = "预收款记录";

    public function index(Content $content)
    {
        return $content
            ->header('预收款记录')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfAccesspreshou());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('supplyname', __('客户ID'))->display(function (){
                    return $this->CmfCustomer['supplyname'];});
                $grid->column('linkman', __('联系人'));
                $grid->column('jine', __('金额'));
                $grid->column('guanlianbillid', __('关联清单ID'));
                $grid->column('accountid', '帐户ID');
                $grid->column('opertype', '操作类型')
                    ->display(function ($opertype) {
                        return $opertype ? '是' : '否';
                    });
                
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfAccesspreshou());
                $form->select('customerid', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200|unique:cmf_accesspreshou',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('linkman', __('联系人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('curchuzhi', __('预支出'))->symbol('￥')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('accountid', __('帐户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->currency('jine', __('金额'))->symbol('￥')
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('opertype', __('操作类型'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('guanlianbillid', __('关联清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->textarea('beizhu', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('billdeptid', __('清单部门ID'))
                ->options(CmfDepartment::pluck('DEPT_NAME','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('预收款记录');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('预收款记录')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfAccesspreshou());
        return $content
            ->header('预收款记录')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
            $show = new Show(CmfAccesspreshou::findOrFail($id));

            $model = $show->getModel();
            $opertype = $model['opertype'];

            $show->field('id', __('编号'));
            $show->field('supplyname', __('客户ID'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['supplyname'];
            });
            $show->field('linkman', __('联系人'));
            $show->field('curchuzhi', __('预支出'));
            $show->field('accountid', __('帐户ID'));
            $show->field('jine', __('金额'));
            
            if($opertype == 1) {
                $show->field('opertype', __('是'))->as(function ($opertype) {
                    
                });
            } elseif($opertype == 0) {
                $show->field('opertype', __('否'));
            } else {
                $show->field('opertype', __('其他类型'));
            }

            $show->field('guanlianbillid', __('关联清单ID'));
            $show->field('createman', __('创建人'));
            $show->field('createtime', __('创建时间'));
            $show->field('beizhu', __('备注'));
            $show->field('DEPT_NAME', __('清单部门ID'))->as(function ($CmfDepartment) {
                return $this->CmfDepartment['DEPT_NAME'];
            });
            return $show;
        }
}

?>