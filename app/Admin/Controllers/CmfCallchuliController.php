<?php

namespace App\Admin\Controllers;

use App\Models\CmfCallchuli;
use App\Models\CmfCustomer;
use App\Models\CmfLinkman;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;

class CmfCallchuliController extends AdminController {

	protected $title = "来电处理";

    public function index(Content $content)
    {
        return $content
            ->header('来电处理')
            ->description('列表')
            ->body($this->grid());
    }

    
    protected function grid() {
                $grid = new Grid(new CmfCallchuli());
                $grid->column('id', __('编号'))->sortable();
                $grid->column('tel', __('电话号码'));
                $grid->column('customer', __('客户'));
                $grid->column('linkman', __('联系人'));
                $grid->column('chulitime', __('处理时间'));
                $grid->column('ifchuli', '是否处理')
                    ->display(function ($ifchuli) {
                        return $ifchuli ? '是' : '否';
                    });
                
                $grid->column('createman', __('创建人'));
                $grid->column('createtime', __('创建时间'));
                $grid->paginate(10);

                return $grid;
        }

        protected function form()
        {
                $form = new Form(new CmfCallchuli());
                $form->text('tel', __('电话号码'))
                ->creationRules('required|max:200|unique:cmf_callchuli',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符','unique' => '数据已经存在']);
                $form->text('customer', __('客户'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('linkman', __('联系人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('content', __('内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->text('createman', __('创建人'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->datetime('createtime', __('创建时间'))
                ->creationRules('required', ['required' => '创建时间不能为空']);
                $form->radio('ifchuli', __('是否处理'))->options(['1' => '是','0' => '否'])
                ->rules('required');
                $form->datetime('chulitime', __('处理时间'))
                ->creationRules('required', ['required' => '处理时间不能为空']);
                $form->radio('calltype', __('呼叫类型'))->options(['1' => '是','0' => '否','2' => '其他'])
                ->rules('required');
                $form->radio('callertype', __('呼叫者类型'))->options(['1' => '是','0' => '否','2' => '其他'])
                ->rules('required');
                $form->select('customerid', __('客户ID'))
                ->options(CmfCustomer::pluck('supplyname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->textarea('chulicontent', __('处理内容'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                $form->select('linkmanid', __('联系人ID'))
                ->options(CmfLinkman::pluck('linkmanname','id'))
                ->creationRules('required|max:200',
                        ['required' => '此项不能为空','max' =>'不能大于200个字符']);
                return $form;
        }

        public function create(Content $content) {
        return Admin::content(function (Content $content) {
            $content->header('来电处理');
            $content->description('新增');
            $content->body($this->form());
            });
        }

        public function show($id, Content $content)
        {
        return $content
            ->header('来电处理')
            ->description('详情')
            ->body($this->detail($id));
        }

        public function edit($id, Content $content)
        {
            $form = new Form(new CmfCallchuli());
        return $content
            ->header('来电处理')
            ->description('编辑')
            ->body($this->form()->edit($id));
        }

        protected function detail($id)
        {
        $show = new Show(CmfCallchuli::findOrFail($id));

        $show->field('id', __('编号'));
        $show->field('tel', __('电话号码'));
        $show->field('customer', __('客户'));
        $show->field('linkman', __('联系人'));
        $show->field('content', __('内容'));
        $show->field('createman', __('创建人'));
        $show->field('createtime', __('创建时间'));
        $show->field('ifchuli', __('是否处理'))->as(function($ifchuli) {
            if($ifchuli == 1) {
                $ifchuli='已处理';
            }else {
                $ifchuli='未处理';
            }
            return $ifchuli;
        });
        $show->field('chulitime', __('处理时间'));
        $show->field('calltype', __('呼叫类型'));
        $show->field('callertype', __('呼叫者类型'));
        $show->field('supplyname', __('客户ID'))->as(function ($CmfCustomer) {
                return $this->CmfCustomer['supplyname'];
            });
        $show->field('chulicontent', __('处理内容'));
        $show->field('linkmanname', __('联系人ID'))->as(function ($CmfLinkman) {
                return $this->CmfLinkman['linkmanname'];
            });
        return $show;
        }
}

?>