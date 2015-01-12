define([
    "dojo/_base/declare",
    'hc-backend/layout/main/content/_ContentMixin',
    "dijit/_TemplatedMixin",
    "dojo/text!./templates/Container.html",
    "dojo/i18n!../nls/List",
    "hc-backend/router",
    "hcb-client/list/widget/Grid",
    "hc-backend/dgrid/form/RefreshSelectedButton"
], function(declare, _ContentMixin, _TemplatedMixin,
            template, i18nList, router, Grid, RefreshSelectedButton) {
    return declare([ _ContentMixin, _TemplatedMixin ], {
        //  summary:
        //      List container. Contains widgets who responsible for
        //      displaying list of clients.
        templateString: template,

        baseClass: 'clientsList',
        
        postCreate: function () {
            try {
                this._gridWidget = new Grid({'class': this.baseClass+'Grid'});

                this._blockWidget = new RefreshSelectedButton({'label': i18nList.blockSelectedButton,
                                                               'target': router.assemble('/block', {}, true),
                                                               'name': 'clients',
                                                               'class': this.baseClass+'BlockClients',
                                                               'grid': this._gridWidget});
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        },

        startup: function () {
            try {
                this.addChild(this._blockWidget);
                this.addChild(this._gridWidget);
                this.inherited(arguments);
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        },

        refresh: function () {
            try {
                this._gridWidget.refresh({keepScrollPosition: true});
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        }
    });
});
