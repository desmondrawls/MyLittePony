class Mlp.Views.everFree extends Backbone.View
  template: JST['riding/everFree']

  render: ->
    $(@el).html(@template())
    this