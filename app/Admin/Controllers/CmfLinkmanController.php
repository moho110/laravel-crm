<?php

namespace App\Admin\Controllers;

use App\Models\CmfLinkman;
use App\Models\CmfCustomer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfLinkmanController extends AdminController {

	protected $title = "联系人";

    public function index(Content $content)
    {
        return $content
            ->header('联系人')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfLinkman());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('linkmanname', __('联系人姓名'));
                $grid->column('phone', __('电话号码'));
                $grid->column('fax', __('传真号码'));
                $grid->column('email', __('电子邮件'));

                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfLinkman());
                $form->text('linkmanname', __('联系人姓名'))
                ->creationRules('required|max:200|unique:cmf_linkman',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('linkmanpy', __('联系人简称'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('gender', __('性别'))->options(['1' => '男','0' => '女'])
                ->rules('required');
                $form->text('phone', __('电话号码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('fax', __('传真号码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->email('email', __('电子邮件'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('postcode', __('邮政编码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('mark', __('备注'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('business', __('业务'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('businessexpian', __('业务扩展'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('address', __('地址'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->radio('user_flag', __('用户标识'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->text('user_id', __('用户ID'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('supplycn', __('供应商编码'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('customerid', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('mobile', __('移动电话'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->date('birthday', __('出生年月日'))
                ->creationRules('required',['required' => '此项不能为空']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('联系人');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('联系人')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfLinkman());
        return $content
            ->header('联系人')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfLinkman::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('linkmanname', __('联系人姓名'));
        $show->field('linkmanpy', __('联系人简称'));
        $show->field('gender', __('性别'));
        $show->field('phone', __('电话号码'));
        $show->field('fax', __('传真号码'));
        $show->field('email', __('电子邮件'));
        $show->field('postcode', __('邮政编码'));
        $show->field('mark', __('备注'));
        $show->field('business', __('业务'));
        $show->field('businessexpian', __('业务扩展'));
        $show->field('address', __('地址'));
        $show->field('user_flag', __('用户标识'));
        $show->field('user_id', __('用户ID'));
        $show->field('supplycn', __('供应商编码'));
        $show->field('customerid', __('客户ID'));
        $show->field('mobile', __('移动电话'));
        $show->field('birthday', __('出生年月日'));
        return $show;
        }
}

?>