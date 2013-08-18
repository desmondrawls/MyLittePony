class Mlp.Views.Hats extends Backbone.View
  template: JST['shopping/hats_index']
  className: 'column span-4'

  events:
    'click .clothing-list-item': 'changeHat'


  initialize: ->
    @hats = @collection.hats()
    this.on('change', @render, this)
    this.on('reset', @render, this)
    this.on('add', @appendHat, this)
    this.on('render', @positionHats, this)

  render: =>
    console.log("rendering a hat...")
    $(@el).html(@template())
    for hat in @hats
      @appendHat(hat)
    this

  appendHat: (hat) ->
    hat_view = new Mlp.Views.ClothingListItem(model: hat, id: "hats-#{hat.get('id')}")
    @$('#hats').append(hat_view.render().el)

  positionHats: ->
    for hat in @hats
      top = ((hat.get('id'))*67)-40
      left = 72
      $("#hats-#{hat.get('id')}").css("top", "#{top}px")
      $("#hats-#{hat.get('id')}").css("left", "#{left}%")
    this

  changeHat: (event) ->
    event.preventDefault()
    console.log("Changing Hats yo...")
    hat_id = event.currentTarget.id.split("-")[1]
    console.log(hat_id)
    @collection.changeHat(hat_id)