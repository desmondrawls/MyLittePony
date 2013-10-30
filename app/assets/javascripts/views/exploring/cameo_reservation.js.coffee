class Mlp.Views.CameoReservation extends Backbone.View
  template: JST['exploring/cameo_reservation']

  initialize: ->
    Mlp.vent.on('everfree_scene:rendered', @render, this)
    console.log("initialize cameo")
    console.log(@collection)

  render: (pony_id = null) ->
    console.log("rendering cameo_reservation...")
    @removeCameo
    $(@el).html(@template())
    @appendCameo(pony_id, @collection)
    this

  appendCameo: (pony_id, collection) =>
    console.log("appending cameo...")
    if pony_id
      @cameo = collection.where id: pony_id
      console.log("the cameo i'm appending is #{@cameo[0]}")
      cameoview = new Mlp.Views.Cameo(model: @cameo[0])
      @$('#cameo-reservation').append(cameoview.render().el)  

  removeCameo: ->
    console.log("removing cameoview")
    if this.current_view
      this.current_view.close() 
      this.current_view.unbind()