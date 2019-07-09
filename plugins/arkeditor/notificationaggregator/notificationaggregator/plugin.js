/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
(function(){"use strict";function t(n,t,i){this.editor=n;this.notification=null;this._message=new CKEDITOR.template(t);this._singularMessage=i?new CKEDITOR.template(i):null;this._tasks=[];this._totalWeights=0;this._doneWeights=0;this._doneTasks=0}function n(n){this._weight=n||1;this._doneWeight=0;this._isCanceled=!1}CKEDITOR.plugins.add("notificationaggregator",{requires:"notification"});t.prototype={createTask:function(n){n=n||{};var i=!this.notification,t;i&&(this.notification=this._createNotification());t=this._addTask(n);t.on("updated",this._onTaskUpdate,this);t.on("done",this._onTaskDone,this);t.on("canceled",function(){this._removeTask(t)},this);return this.update(),i&&this.notification.show(),t},update:function(){this._updateNotification();this.isFinished()&&this.fire("finished")},getPercentage:function(){return this.getTaskCount()===0?1:this._doneWeights/this._totalWeights},isFinished:function(){return this.getDoneTaskCount()===this.getTaskCount()},getTaskCount:function(){return this._tasks.length},getDoneTaskCount:function(){return this._doneTasks},_updateNotification:function(){this.notification.update({message:this._getNotificationMessage(),progress:this.getPercentage()})},_getNotificationMessage:function(){var n=this.getTaskCount(),i=this.getDoneTaskCount(),r={current:i,max:n,percentage:Math.round(this.getPercentage()*100)},t;return t=n==1&&this._singularMessage?this._singularMessage:this._message,t.output(r)},_createNotification:function(){return new CKEDITOR.plugins.notification(this.editor,{type:"progress"})},_addTask:function(t){var i=new n(t.weight);return this._tasks.push(i),this._totalWeights+=i._weight,i},_removeTask:function(n){var t=CKEDITOR.tools.indexOf(this._tasks,n);t!==-1&&(n._doneWeight&&(this._doneWeights-=n._doneWeight),this._totalWeights-=n._weight,this._tasks.splice(t,1),this.update())},_onTaskUpdate:function(n){this._doneWeights+=n.data;this.update()},_onTaskDone:function(){this._doneTasks+=1;this.update()}};CKEDITOR.event.implementOn(t.prototype);n.prototype={done:function(){this.update(this._weight)},update:function(n){if(!this.isDone()&&!this.isCanceled()){var t=Math.min(this._weight,n),i=t-this._doneWeight;this._doneWeight=t;this.fire("updated",i);this.isDone()&&this.fire("done")}},cancel:function(){this.isDone()||this.isCanceled()||(this._isCanceled=!0,this.fire("canceled"))},isDone:function(){return this._weight===this._doneWeight},isCanceled:function(){return this._isCanceled}};CKEDITOR.event.implementOn(n.prototype);CKEDITOR.plugins.notificationAggregator=t;CKEDITOR.plugins.notificationAggregator.task=n})()