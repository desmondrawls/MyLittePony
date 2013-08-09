class Mlp.Views.Pony extends Backbone.View
  template: JST['ponies/pony']
  tagName: 'li'
  className: 'pony_list_item'

  events:
    'click': 'showPony'

  initialize: ->
    @model.on('change', @render, this)
    @model.on('select', @selectPony, this)

  showPony: ->
    Mlp.vent.trigger('click', @model)

  selectPony: ->
    $('.pony').removeClass('saddled')
    @$('.selected').addClass('saddled')

  render: =>
    $(@el).html(@template(pony: this.model))
    this