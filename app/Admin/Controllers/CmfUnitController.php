<?php

namespace App\Admin\Controllers;

use App\Models\CmfUnit;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfUnitController extends AdminController {

	protected $title = "单位管理";

    public function index(Content $content)
    {
        return $content
            ->header('单位管理')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfUnit());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('UNIT_NAME', __('单元名称'));
                $grid->column('TEL_NO', __('电话号码'));
                $grid->column('FAX_NO', __('传真号码'));
                $grid->column('POST_NO', __('邮政编码'));
                $grid->column('ADDRESS', '地址');
                $grid->column('URL', __('URL地址'));
                $grid->column('EMAIL', __('电子邮件'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfUnit());
                $form->text('UNIT_NAME', __('单位名称'))
                ->creationRules('required|max:200|unique:cmf_unit',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('TEL_NO', __('电话号码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('FAX_NO', __('传真号码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('POST_NO', __('邮政编码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('ADDRESS', __('联系地址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->url('URL', __('URL地址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->email('EMAIL', __('电子邮件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('BANK_NAME', __('银行名称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('BANK_NO', __('银行帐号'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('numzero', __('数量'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('buybillid', __('购买清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('sellbillid', __('销售清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('stockinbillid', __('入库清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('stockoutbillid', __('出库清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('storecheckbillid', __('库存检查清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('stockchangebillid', __('库存修改清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('zuzhuangbillid', __('组装清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('feiyongbillid', __('费用清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('prepaybillid', __('预支付清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('preshoubillid', __('预收款清单ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('dingjiagongshi', __('订价公式'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('单位管理');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('单位管理')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfUnit());
        return $content
            ->header('单位管理')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfUnit::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('UNIT_NAME', __('单位名称'));
        $show->field('TEL_NO', __('电话号码'));
        $show->field('FAX_NO', __('传真号码'));
        $show->field('POST_NO', __('邮政编码'));
        $show->field('ADDRESS', __('联系地址'));
        $show->field('URL', __('URL地址'));
        $show->field('EMAIL', __('电子邮件'));
        $show->field('BANK_NAME', __('银行名称'));
        $show->field('BANK_NO', __('银行帐号'));
        $show->field('numzero', __('数量'));
        $show->field('buybillid', __('购买清单ID'));
        $show->field('sellbillid', __('销售清单ID'));
        $show->field('stockinbillid', __('入库清单ID'));
        $show->field('stockoutbillid', __('出库清单ID'));
        $show->field('storecheckbillid', __('库存检查清单ID'));
        $show->field('stockchangebillid', __('库存修改清单ID'));
        $show->field('zuzhuangbillid', __('组装清单ID'));
        $show->field('feiyongbillid', __('费用清单ID'));
        $show->field('prepaybillid', __('预支付清单ID'));
        $show->field('preshoubillid', __('预收款清单ID'));
        $show->field('dingjiagongshi', __('订价公式'));
        return $show;
        }
}

?>